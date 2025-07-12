let MobileMenu1 = {};
MobileMenu1.toggles = {
	clickedEl: false,
	init: function () {
		this.toggle();
	},
	performToggle: function (element) {
		let target;
		let timeOutTime;
		let classToToggle;
		let doc = document;
		let toggle = element;
		let targetString = toggle.dataset.toggleTarget;
		let activeClass = 'active';
		// Elements to focus after modals are closed.
		if (targetString === '') {
			target = toggle.nextSibling;
		} else {
			target = doc.querySelector(targetString);
		}
		setTimeout(function () {
			subMenued = target.classList.contains('sub-menu'),
				newTarget = subMenued ? toggle.closest('.menu-item').querySelector('.sub-menu') : target;
			// Toggle the target of the clicked toggle.
			if (toggle.dataset.toggleType === 'slidetoggle') {
				MobileMenu1MenuToggle(newTarget);
			} else {
				newTarget.classList.toggle(classToToggle);
			}
			// If the toggle target is 'next', only give the clicked toggle the active class.
			if (targetString === '') {
				toggle.classList.toggle(activeClass);
			} else {
				// If not, toggle all toggles with this toggle target.
				doc.querySelector('*[data-toggle-target="' + targetString + '"]').classList.toggle(activeClass);
			}
		}, timeOutTime);
	},
	// Do the toggle.
	toggle: function () {
		let self = this;
		document.querySelectorAll('*[data-toggle-target]').forEach(function (element) {
			element.addEventListener('click', function (event) {
				event.preventDefault();
				self.performToggle(element);
			});
		});
	},
};
/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 */
function MobileMenu1DomReady(fn) {
	if (typeof fn !== 'function') {
		return;
	}
	if (document.readyState === 'interactive' || document.readyState === 'complete') {
		return fn();
	}
	document.addEventListener('DOMContentLoaded', fn, false);
}
MobileMenu1DomReady(function () {
	MobileMenu1.toggles.init();              // Handle toggles.
});
/*	-----------------------------------------------------------------------------------------------
	Helper functions
--------------------------------------------------------------------------------------------------- */
/* Toggle an attribute ----------------------- */
function MobileMenu1MenuToggle(target, duration) {
	let initialParentHeight, finalParentHeight, menu, transitionListener,
		initialPositions = [],
		finalPositions = [];
	if (!target) {
		return;
	}
	menu = target.closest('.menu-wrapper');
	// Step 1: look at the initial positions of every menu item.
	menuItems = menu.querySelectorAll('.menu-item');
	menuItems.forEach(function (menuItem, index) {
		initialPositions[index] = { x: menuItem.offsetLeft, y: menuItem.offsetTop };
	});
	initialParentHeight = target.parentElement.offsetHeight;
	target.classList.add('toggling-target');
	// Step 2: toggle target menu item and look at the final positions of every menu item.
	target.classList.toggle('active');
	menuItems.forEach(function (menuItem, index) {
		finalPositions[index] = { x: menuItem.offsetLeft, y: menuItem.offsetTop };
	});
	finalParentHeight = target.parentElement.offsetHeight;
	// Step 3: close target menu item again.
	// The whole process happens without giving the browser a chance to render, so it's invisible.
	target.classList.toggle('active');
	/*
	 * Step 4: prepare animation.
	 * Position all the items with absolute offsets, at the same starting position.
	 * Shouldn't result in any visual changes if done right.
	 */
	menu.classList.add('is-toggling');
	target.classList.toggle('active');
	menuItems.forEach(function (menuItem, index) {
		let initialPosition = initialPositions[index];
		if (initialPosition.y === 0 && menuItem.parentElement === target) {
			initialPosition.y = initialParentHeight;
		}
		menuItem.style.transform = 'translate(' + initialPosition.x + 'px, ' + initialPosition.y + 'px)';
	});
	/*
	 * The double rAF is unfortunately needed, since we're toggling CSS classes, and
	 * the only way to ensure layout completion here across browsers is to wait twice.
	 * This just delays the start of the animation by 2 frames and is thus not an issue.
	 */
	requestAnimationFrame(function () {
		requestAnimationFrame(function () {
			/*
			 * Step 5: start animation by moving everything to final position.
			 * All the layout work has already happened, while we were preparing for the animation.
			 * The animation now runs entirely in CSS, using cheap CSS properties (opacity and transform)
			 * that don't trigger the layout or paint stages.
			 */
			menu.classList.add('is-animating');
			menuItems.forEach(function (menuItem, index) {
				let finalPosition = finalPositions[index];
				if (finalPosition.y === 0 && menuItem.parentElement === target) {
					finalPosition.y = finalParentHeight;
				}
				if (duration !== undefined) {
					menuItem.style.transitionDuration = duration + 'ms';
				}
				menuItem.style.transform = 'translate(' + finalPosition.x + 'px, ' + finalPosition.y + 'px)';
			});
			if (duration !== undefined) {
				target.style.transitionDuration = duration + 'ms';
			}
		});
		// Step 6: finish toggling.
		// Remove all transient classes when the animation ends.
		transitionListener = function () {
			menu.classList.remove('is-animating');
			menu.classList.remove('is-toggling');
			target.classList.remove('toggling-target');
			menuItems.forEach(function (menuItem) {
				menuItem.style.transform = '';
				menuItem.style.transitionDuration = '';
			});
			target.style.transitionDuration = '';
			target.removeEventListener('transitionend', transitionListener);
		};
		target.addEventListener('transitionend', transitionListener);
	});
}