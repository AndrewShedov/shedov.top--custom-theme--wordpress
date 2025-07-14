document.addEventListener("DOMContentLoaded", function () {

   // dark theme
   const html = document.documentElement;
   const userColorTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
   let ThemeStatus = window.localStorage.getItem("darkTheme")
      ? JSON.parse(window.localStorage.getItem("darkTheme"))
      : userColorTheme;

   function applyThemeUI(status) {
      html.setAttribute("data-dark-theme", status ? "true" : "false");

      const sun = document.querySelector(".sun");
      const moon = document.querySelector(".half_moon");
      const sunMobile = document.querySelector(".sun_icon_mobile");
      const moonMobile = document.querySelector(".half_moon_icon_mobile");

      if (!sun || !moon || !sunMobile || !moonMobile) return;

      if (status) {
         sun.style.display = "block";
         moon.style.display = "none";
         sunMobile.style.display = "block";
         moonMobile.style.display = "none";
      } else {
         sun.style.display = "none";
         moon.style.display = "block";
         sunMobile.style.display = "none";
         moonMobile.style.display = "block";
      }
   }

   applyThemeUI(ThemeStatus);

   window.ChangeTheme = function () {
      ThemeStatus = !ThemeStatus;
      localStorage.setItem("darkTheme", ThemeStatus);
      applyThemeUI(ThemeStatus);
   };
   // /dark theme

   // adaptation to different screens admin bar 
   // in the header
   if (document.body.classList.contains('admin-bar')) {
      let wpAdminbarHeight = document.getElementById('wpadminbar').offsetHeight;
      document.getElementById("desktop_menu_part_1_wrap").style.marginTop = wpAdminbarHeight + "px", document.getElementById("mobile_menu_part_1").style.marginTop = wpAdminbarHeight + "px", document.getElementById("mobile_menu_part_2").style.top = wpAdminbarHeight + "px", document.getElementById("desktop_menu_part_2_wrap").style.top = wpAdminbarHeight + "px"
   }
   // in the footer
   // /adaptation to different screens admin bar

   // copy code
   function initCodeCopy() {
      const codeBlocks = document.querySelectorAll('code[class*="language-"]');

      codeBlocks.forEach(block => {
         const lang = block.className.split('-')[1] || '';
         const pre = block.parentElement;
         const wrapper = document.createElement('div');
         wrapper.className = 'code-wrapper';
         pre.parentElement.insertBefore(wrapper, pre);
         wrapper.appendChild(pre);

         const copyBtn = document.createElement('button');
         copyBtn.className = 'copy-button';
         copyBtn.dataset.lang = lang;
         copyBtn.innerHTML = getCopyIcon();
         wrapper.appendChild(copyBtn);

         copyBtn.addEventListener('click', () => {
            const codeText = block.textContent;
            copyToClipboard(codeText).then(() => {
               copyBtn.innerHTML = getCheckIcon();
               copyBtn.classList.add('copied');
               setTimeout(() => {
                  copyBtn.innerHTML = getCopyIcon();
                  copyBtn.classList.remove('copied');
               }, 1000);
            }).catch(() => alert('Failed to copy'));
         });
      });

      function getCopyIcon() {
         return `<svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="ch-code-button"><title>Copy</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>`;
      }

      function getCheckIcon() {
         return `<svg class="button_copied_code ch-code-button" viewBox="2 -2 24 24" xmlns="http://www.w3.org/2000/svg"><polyline points="21 5 12 14 8 10" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.7px;"></polyline><path d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.7px;"></path></svg>`;
      }

      function copyToClipboard(text) {
         if (navigator.clipboard) {
            return navigator.clipboard.writeText(text);
         } else {
            return fallbackCopy(text);
         }
      }

      function fallbackCopy(text) {
         return new Promise((resolve, reject) => {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.top = 0;
            textarea.style.left = 0;
            document.body.appendChild(textarea);
            textarea.focus();
            textarea.select();
            try {
               const success = document.execCommand('copy');
               document.body.removeChild(textarea);
               success ? resolve() : reject();
            } catch (err) {
               document.body.removeChild(textarea);
               reject(err);
            }
         });
      }
   }

   initCodeCopy();
   // /copy code

   /* single.php */
   /* single_share_link */
   document.querySelectorAll(".single_share_copy_icon").forEach((element) => {
      element.addEventListener("click", (event) => {
         const href = element.getAttribute('data-href');
         navigator.clipboard.writeText(href);
         element.parentElement.querySelector(".single_share_copy_notification").querySelector("p").textContent = "Copied";
      });
   });
   document.querySelectorAll(".single_share_copy_icon").forEach((element) => {
      element.addEventListener("mouseover", (event) => {
         element.parentElement.querySelector(".single_share_copy_notification").querySelector("p").textContent = "Copy";
      });
   });
   /* /single_share_link */
   /* /single.php */
   /*index.php */
   /* post share */
   /*share list open/close */
   const ob = document.querySelector("html");
   ob.addEventListener("click", (e) => {
      const o = e.target.closest(".post_share");
      if (!o) {
         if (e.target.closest(".post__share_list")) return;
         ob.querySelectorAll(".post__share_list.show").forEach((el) =>
            animateDisplay(el, "show", "block", 150)
         );
         return;
      }
      const op = e.target.closest(".post_share_wrap");
      const el = op.querySelector(".post__share_list");
      animateDisplay(el, "show", "block", 150);
   });
   function animateDisplay(target, animationClass, displayType, timeout) {
      var doneTimedDisplay = false,
         displaying = false;
      target.addEventListener("transitionend", function () {
         if (!target.classList.contains("show")) {
            target.style.display = "none";
         }
         doneTimedDisplay = true;
      });
      if (!target.style.display || target.style.display === "none") {
         displaying = true;
         target.style.display = displayType;
      } else {
         displaying = false;
      }
      setTimeout(function () {
         target.classList.toggle(animationClass);
         doneTimedDisplay = false;
      }, 10);
      if (!displaying) {
         setTimeout(function () {
            if (!doneTimedDisplay) {
               target.style.display = "none";
            }
            doneTimedDisplay = true;
         }, timeout);
      }
   }
   /* /post share */
   /* post share link */
   ob.addEventListener("click", (e) => {
      const o = e.target.closest(".post__share_link");
      if (!o) {
         ob.querySelectorAll(".post__share_link").forEach((element) => {
            element.addEventListener("click", function () {
               const href = element.getAttribute('data-href');
               navigator.clipboard.writeText(href);
               element.parentElement.querySelector(".post__share_link_copy_notification_window").querySelector("p").textContent = "Copied";
            });
         });
         return;
      }
   });
   ob.addEventListener("click", (e) => {
      const o = e.target.closest(".post__share_link");
      if (!o) {
         ob.querySelectorAll(".post__share_link").forEach((element) => {
            element.addEventListener("mouseover", function () {
               element.parentElement.querySelector(".post__share_link_copy_notification_window").querySelector("p").textContent = "Copy";
            });
         });
         return;
      }
   });
   /* /post share link */
   /* /index.php */
   let burger = document.getElementById("burger");
   let mobile_side_burger = document.getElementById("mobile_side_burger");
   let menu = document.getElementById("menu");
   let BodyHiddenOver = document.body;
   // Function opening menu
   function calcShowMenu(showMenu) {
      burger.classList.toggle("burger-open", showMenu);
      mobile_side_burger.classList.toggle("burger-open", showMenu);
      menu.classList.toggle("menu-open", showMenu);
      menu.classList.toggle("menuMoveLeft", showMenu);
      menu.classList.toggle("menu_shadow", showMenu);
      BodyHiddenOver.classList.toggle("BodyHiddenOver", showMenu);
      /* shift towards burger */
      /*
                  [burger.style].map(v => v.transform = `translateX(${showMenu ? -menuWidth - 25 : 0}px)`);
           */
      /* /shift towards burger */
   }
   let showMenu = false;
   // Pressing a Burger
   burger.addEventListener("click", () => calcShowMenu((showMenu = !showMenu)));
   mobile_side_burger.addEventListener("click", () =>
      calcShowMenu((showMenu = !showMenu))
   );
   // Closing when pressed outside the menu
   window.addEventListener("mousedown", (event) => {
      if (!event.target.closest(".menu, .burger"))
         calcShowMenu((showMenu = false));
   });
   // Closing when pressed outside the menu for mobile
   window.addEventListener("touchstart", (event) => {
      if (!event.target.closest(".menu, .burger"))
         calcShowMenu((showMenu = false));
   });
   // Closing when you click on a menu item
   document.getElementById("menu").onclick = function (event) {
      let target = event.target;
      if (target.tagName == "A") {
         menu.classList.toggle("menu_shadow", showMenu);
      }
   };
   // Cookies notification 
   window.localStorage.getItem("CookiesAccept") ? document.getElementById("cookies_wrap").style.display = "none" : document.getElementById("cookies_wrap").style.display = "flex";
   document.getElementById('cookies_accept_button').onclick = function () {
      window.localStorage.setItem("CookiesAccept", true)
      document.getElementById("cookies_wrap").style.display = "none";
   };
   // /Cookies notification
   // up button
   const upButton = document.getElementById("UpButton");
   const offset = 100;

   function checkScroll() {
      if (window.scrollY > offset) {
         upButton.classList.add("visible");
      } else {
         upButton.classList.remove("visible");
      }
   }

   // When loading
   checkScroll();

   window.addEventListener("scroll", checkScroll);

   upButton.addEventListener("click", function (e) {
      e.preventDefault();
      window.scrollTo(0, 0); // speed
      // window.scrollTo({ top: 0, behavior: 'smooth' });
   });
   // /up button
   // search
   // desktop search
   const desktopSearchContainer = document.querySelector(".desktop_menu_part_2__search");
   const desktopSearchIcon = document.querySelector(".desktop_menu_part_2__search_icon");
   const desktopSearchInput = document.querySelector(".desktop_menu_part_2__search_input");
   const desktopSearchClearButton = document.querySelector(".desktop_menu_part_2__search_button_clear");
   const desktopSearchSubmitButton = document.querySelector(".desktop_menu_part_2__search_button_search");

   // show/hide search field
   desktopSearchIcon.addEventListener("click", () => {
      desktopSearchContainer.classList.toggle("visible");
      if (desktopSearchContainer.classList.contains("visible")) {
         desktopSearchInput.focus();
      }
   });

   // hide on click outside of search
   document.addEventListener("click", (e) => {
      if (
         !desktopSearchContainer.contains(e.target) &&
         !desktopSearchIcon.contains(e.target)
      ) {
         desktopSearchContainer.classList.remove("visible");
      }
   });

   // clearing input and hiding the clear button
   desktopSearchClearButton.addEventListener("click", () => {
      desktopSearchInput.value = "";
      desktopSearchClearButton.style.display = "none";
      desktopSearchSubmitButton.disabled = true;
   });

   // show clear button and enable submit
   desktopSearchInput.addEventListener("input", () => {
      if (desktopSearchInput.value.trim().length > 0) {
         desktopSearchClearButton.style.display = "flex";
         desktopSearchSubmitButton.disabled = false;
      } else {
         desktopSearchClearButton.style.display = "none";
         desktopSearchSubmitButton.disabled = true;
      }
   });

   // closing on form submission
   desktopSearchSubmitButton.addEventListener("click", () => {
      desktopSearchContainer.classList.remove("visible");
   });

   // start: block the "search" button
   desktopSearchSubmitButton.disabled = true;
   // /desktop search

   // mobile search
   const mobileSearchContainer = document.querySelector(".mobile_menu_part_2_search");
   const mobileSearchIcon = document.querySelector(".mobile_menu_part_2_search_icon");
   const mobileSearchInput = document.querySelector(".mobile_menu_part_2_search_input");
   const mobileSearchClearButton = document.querySelector(".mobile_menu_part_2_search_button_clear");
   const mobileSearchSubmitButton = document.querySelector(".mobile_menu_part_2_search_button_search");

   // show/hide search field
   mobileSearchIcon.addEventListener("click", () => {
      mobileSearchContainer.classList.toggle("visible");
      if (mobileSearchContainer.classList.contains("visible")) {
         mobileSearchInput.focus();
      }
   });

   // hide on click outside of search
   document.addEventListener("click", (e) => {
      if (
         !mobileSearchContainer.contains(e.target) &&
         !mobileSearchIcon.contains(e.target)
      ) {
         mobileSearchContainer.classList.remove("visible");
      }
   });

   // clearing input and hiding the clear button
   mobileSearchClearButton.addEventListener("click", () => {
      mobileSearchInput.value = "";
      mobileSearchClearButton.style.display = "none";
      mobileSearchSubmitButton.disabled = true;
   });

   // show clear button and enable submit
   mobileSearchInput.addEventListener("input", () => {
      if (mobileSearchInput.value.trim().length > 0) {
         mobileSearchClearButton.style.display = "flex";
         mobileSearchSubmitButton.disabled = false;
      } else {
         mobileSearchClearButton.style.display = "none";
         mobileSearchSubmitButton.disabled = true;
      }
   });

   // closing on form submission
   mobileSearchSubmitButton.addEventListener("click", () => {
      mobileSearchContainer.classList.remove("visible");
   });

   // start: block the "search" button
   mobileSearchSubmitButton.disabled = true;
   // /mobile search

   // /search

   /* /hide icons in the header on the contact page */
   if (document.querySelector(".contacts_wrap")) {
      const desktopIcons = document.querySelector(".desktop_menu_part_1_social_icons");
      const mobileIcons = document.querySelector(".mobile_menu_part_1_social_icons");

      if (desktopIcons) {
         desktopIcons.classList.add("desktop_menu_part_1_social_icons_fade-out");
      }

      if (mobileIcons) {
         mobileIcons.classList.add("mobile_menu_part_1_social_icons_fade-out");
      }
   }
   /* /hide icons in the header on the contact page */

   // show posts if there are any
   if (document.querySelector(".similar_post")) {
      const similarWrap = document.getElementById("similar_posts_wrap_1");
      if (similarWrap) similarWrap.style.display = "block";
   }
   // /show posts if there are any 

   // show comments if there are any
   if (document.querySelector(".comments-area")) {
      const commentsWrap = document.getElementById("single_number_comments_wrap");
      if (commentsWrap) commentsWrap.style.display = "block";
   }
   // /show comments if there are any

   /* disable search, if the search field is empty */
   // desktop search
   const desktopInput = document.querySelector('.desktop_menu_part_2__search_input');
   const desktopButton = document.querySelector('.desktop_menu_part_2__search_button_search');

   if (desktopInput && desktopButton) {
      desktopButton.disabled = true;
      desktopInput.addEventListener('input', () => {
         desktopButton.disabled = !desktopInput.value.trim();
      });
   }

   // mobile search
   const mobileInput = document.querySelector('.mobile_menu_part_2_search_input');
   const mobileButton = document.querySelector('.mobile_menu_part_2_search_button_search');

   if (mobileInput && mobileButton) {
      mobileButton.disabled = true;
      mobileInput.addEventListener('input', () => {
         mobileButton.disabled = !mobileInput.value.trim();
      });
   }
   /* /disable search, if the search field is empty */

   // prismJS (line numbers), adjusting the arrangement of numbers depending on the length of the code
   const codeBlocks = document.querySelectorAll("pre.line-numbers");

   codeBlocks.forEach(pre => {
      const rows = pre.querySelector(".line-numbers-rows");
      const code = pre.querySelector("code");

      if (!rows || !code) return;

      const lines = rows.children.length;
      const digits = lines.toString().length;

      const digitWidthEm = 0.6;
      const spacingEm = 1.5; // distance from numbers to the edge of the container
      const totalWidth = digits * digitWidthEm + spacingEm;

      // we define variables that are used in CSS
      pre.style.setProperty("--prism-line-width", `${totalWidth}em`);
      code.style.setProperty("--prism-line-offset", `${totalWidth + 0.9}em`); // distance from numbers to code
   });
   // /prismJS (line numbers), adjusting the arrangement of numbers depending on the length of the code

});