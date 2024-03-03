document.addEventListener("DOMContentLoaded", function () {
// adaptation to different screens admin bar /Start
// in the header
  if (document.body.classList.contains('admin-bar')) {
  let wpAdminbarHeight = document.getElementById('wpadminbar').offsetHeight;
  document.getElementById("desktop_menu_part_1_wrap").style.marginTop = wpAdminbarHeight+"px", document.getElementById("mobile_menu_part_1").style.marginTop = wpAdminbarHeight+"px", document.getElementById("mobile_menu_part_2").style.top = wpAdminbarHeight+"px", document.getElementById("desktop_menu_part_2_wrap").style.top = wpAdminbarHeight+"px"
 }
// in the footer
// if (document.body.classList.contains('admin-bar')) {
//   document.getElementById("UpButton").style.bottom = wpAdminbarHeight+ 12 +"px"
// }
// adaptation to different screens admin bar /End
  function initCodeCopy() {
    const codeBlocks = document.querySelectorAll('code[class*="language-"]');
    codeBlocks.forEach((block) => {
      const lang = parseLanguage(block);
      const referenceEl = block.parentElement;
      const parent = block.parentElement.parentElement;
      const wrapper = document.createElement('div');
      wrapper.className = 'code-wrapper';
      parent.insertBefore(wrapper, referenceEl);
      wrapper.append(block.parentElement);
      const copyBtn = document.createElement('button');
      copyBtn.setAttribute('class', 'copy-button');
      copyBtn.setAttribute('data-lang', lang); 
      copyBtn.innerHTML = `<svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="ch-code-button"><title>Copy</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6px" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>`;
     wrapper.insertAdjacentElement('beforeend', copyBtn);
    });
    function parseLanguage(block) {
      const className = block.className;
      if (className.startsWith('language')) {
        const [prefix, lang] = className.split('-');
        return lang;
      }
    }
    async function fallbackCopyTextToClipboard(text) {
      return new Promise((resolve, reject) => {
        var textArea = document.createElement('textarea');
        textArea.value = copyInfo.getText();
        // Avoid scrolling to bottom
        textArea.style.top = '0';
        textArea.style.left = '0';
        textArea.style.position = 'fixed';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
          var successful = document.execCommand('copy');
          setTimeout(function () {
            if (successful) {
              resolve('success')
            } else {
              reject('error')
            }
          }, 1);
        } catch (err) {
          setTimeout(function () {
            reject(err)
          }, 1);
        } finally {
          document.body.removeChild(textArea);
        }
      })
    }
    async function copyTextToClipboard(text) {
      return new Promise((resolve, reject) => {
        if (navigator.clipboard) {
          navigator.clipboard.writeText(text).then(
            resolve(),
            function () {
              // try the fallback in case `writeText` didn't work
              fallbackCopyTextToClipboard(text).then(
                () => resolve(),
                () => reject()
              )
            });
        } else {
          fallbackCopyTextToClipboard(text).then(
            () => resolve(),
            () => reject()
          )
        }
      })
    }
    function copy(e) {
      const btn = e.currentTarget;
      const text = e.currentTarget.previousSibling.children[0].textContent;
      copyTextToClipboard(text)
        .then(  
          () => {   
            btn.innerHTML = `<svg class="button_copied_code" fill="black" viewBox="2 -2 24 24" id="check-mark-square-2" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color"><polyline id="secondary" points="21 5 12 14 8 10" style="fill: none; stroke: black; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline><path id="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: black; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>`;
            btn.setAttribute('style', 'opacity: 1');
          },
          () => alert('failed to copy'),
        );
      setTimeout(() => {
        btn.removeAttribute('style');
        btn.innerHTML = `<svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="ch-code-button"><title>Copy</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6px" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>`;
      }, 1000);
    }
    const copyButtons = document.querySelectorAll('.copy-button');
    copyButtons.forEach((btn) => {
      btn.addEventListener('click', copy);
    });
  }
  initCodeCopy()
  /* single.php 1 */
  /* single_share_link 1 */
  document.querySelectorAll(".single_share_copy_icon").forEach((element) => {
    element.addEventListener("click", (event) => {
      const href = element.getAttribute('data-href');
      navigator.clipboard.writeText(href);
      element.parentElement.querySelector(".single_share_copy_notification").querySelector("p").textContent = "Скопировано";
    });
  });
  document.querySelectorAll(".single_share_copy_icon").forEach((element) => {
    element.addEventListener("mouseover", (event) => {
        element.parentElement.querySelector(".single_share_copy_notification").querySelector("p").textContent = "Копировать"; 
    });
  });
  /* single_share_link 2 */
  /* single.php 2 */
  /*index.php 1*/
  /* post cell share 1 */
   /*share list open/close 1*/
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
   /* post cell share 2 */
 
  /* post cell share link 1 */
  ob.addEventListener("click", (e) => {
    const o = e.target.closest(".post__share_link");
    if (!o) {
      ob.querySelectorAll(".post__share_link").forEach((element) => {
        element.addEventListener("click", function () {
          const href = element.getAttribute('data-href');
          navigator.clipboard.writeText(href);
          element.parentElement.querySelector(".post__share_link_copy_notification_window").querySelector("p").textContent = "Скопировано";
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
          element.parentElement.querySelector(".post__share_link_copy_notification_window").querySelector("p").textContent = "Копировать";
        });
      });
      return;
    }
  });
  /* post cell share link 2 */
  /*index.php 2*/
  let burger = document.getElementById("burger");
  let mobile_side_burger = document.getElementById("mobile_side_burger");
  let menu = document.getElementById("menu");
  let BodyHiddenOver = document.body;
  ///////////////Function opening menu
  function calcShowMenu(showMenu) {
    burger.classList.toggle("burger-open", showMenu);
    mobile_side_burger.classList.toggle("burger-open", showMenu);
    menu.classList.toggle("menu-open", showMenu);
    menu.classList.toggle("menuMoveLeft", showMenu);
    menu.classList.toggle("menu_shadow", showMenu);
    BodyHiddenOver.classList.toggle("BodyHiddenOver", showMenu);
  }
  let showMenu = false;
  /////////////////Pressing a Burger
  burger.addEventListener("click", () => calcShowMenu((showMenu = !showMenu)));
  mobile_side_burger.addEventListener("click", () =>
    calcShowMenu((showMenu = !showMenu))
  );
  /////////////Closing when pressed outside the menu
  window.addEventListener("mousedown", (event) => {
    if (!event.target.closest(".menu, .burger"))
      calcShowMenu((showMenu = false));
  });
  /////////////Closing when pressed outside the menu for mobile
  window.addEventListener("touchstart", (event) => {
    if (!event.target.closest(".menu, .burger"))
      calcShowMenu((showMenu = false));
  });
  /////////////Closing when you click on a menu item
  document.getElementById("menu").onclick = function (event) {
    let target = event.target;
    if (target.tagName == "A") {
      menu.classList.toggle("menu_shadow", showMenu);
    }
  };
  // Сookie notification 
  window.localStorage.getItem("СookieNotificationRU") ? document.getElementById("cookie_wrap").style.display = "none" : document.getElementById("cookie_wrap").style.display = "flex";

  document.getElementById('cookie_accept_button').onclick = function () {
  window.localStorage.setItem("СookieNotificationRU", true)
  document.getElementById("cookie_wrap").style.display = "none";
};
 // /Сookie notification
});
jQuery(document).ready(function ($) {
  /* UP BUTTON */
  let offset = 100;
  let speed = 50;
  let duration = 200;
  $(window).scroll(function () {
    if ($(this).scrollTop() < offset) {
      $(".UpButton").fadeOut(duration);
      $(".Wrap_Button").fadeOut(duration);
    } else {
      $(".Wrap_Button").fadeIn(duration);
      $(".UpButton").fadeIn(duration);
    }
  });
  $(".UpButton").on("click", function () {
    $("html, body").animate({
      scrollTop: 0
    }, speed);
    return false;
  });
  /* desktop search /start */
  $(".desktop_menu_part_2__search").hide();
  $(".desktop_menu_part_2__search_icon").click(function () {
    if ($(".desktop_menu_part_2__search").is(":visible")) {
      $(".desktop_menu_part_2__search").fadeOut(50);
    } else {
      $(".desktop_menu_part_2__search").fadeIn(50);
      $(".desktop_menu_part_2__search_input").focus();
    }
  });
  $(document).mouseup(function (e) {
      let div = $(".desktop_menu_part_2__search");
      if (
        !div.is(e.target) &&
        div.has(e.target).length === 0
      ) {
        div.fadeOut(50);
      }
    });
  $(".desktop_menu_part_2__search_button_clear").hide(50);
  setInterval(function () {
    if ($(".desktop_menu_part_2__search_input").val().length != 0) {
      $(".desktop_menu_part_2__search_button_clear").fadeIn(50);
    } else {
      $(".desktop_menu_part_2__search_button_clear").fadeOut(50);
    }
  }, 0);
  /* desktop search /end */
  /* mobile search /start */ 
  $(".mobile_menu_part_2_search").hide();
  $(".mobile_menu_part_2_search_icon").click(function () {
    if ($(".mobile_menu_part_2_search").is(":visible")) {
      $(".mobile_menu_part_2_search").fadeOut(50);
    } else {
      $(".mobile_menu_part_2_search").fadeIn(50);
      $(".mobile_menu_part_2_search_input").focus();
    }
  });
    $(document).mouseup(function (e) {
      let div = $(".mobile_menu_part_2_search");
      if (
        !div.is(e.target) &&
        div.has(e.target).length === 0
      ) {
        div.fadeOut(50);
      }
    });
  $(".mobile_menu_part_2_search_button_clear").hide(50);
  setInterval(function () {
    if ($(".mobile_menu_part_2_search_input").val().length != 0) {
      $(".mobile_menu_part_2_search_button_clear").fadeIn(50);
    } else {
      $(".mobile_menu_part_2_search_button_clear").fadeOut(50);
    }
  }, 0);
    /* mobile search /end */
/* hide icons in the header on the contact page /start */
if (document.querySelector(".contacts_wrap")) {
  $(".desktop_menu_part_1_social_icons").fadeOut('fast');
}
if (document.querySelector(".contacts_wrap")) {
  $(".mobile_menu_part_1_social_icons").fadeOut('fast');
}
/* hide icons in the header on the contact page /end*/
  if ($(".similar_news_cell").length) {
    $("#similar_news_wrap_1").css("display", "block");
  }
  if ($(".comments-area").length) {
    $("#single_number_comments_wrap").css("display", "block");
  }
 /* disable search, if the search field is empty /start */
 let $submit_search_desktop = $('.desktop_menu_part_2__search_button_search');
 $submit_search_desktop.prop('disabled', true);
 $('.desktop_menu_part_2__search_input').on('input change', function() { //'input change keyup paste'
     $submit_search_desktop.prop('disabled', !$(this).val());
 });
 let $submit_search_mobile = $('.mobile_menu_part_2_search_button_search');
 $submit_search_mobile.prop('disabled', true);
 $('.mobile_menu_part_2_search_input').on('input change', function() { //'input change keyup paste'
     $submit_search_mobile.prop('disabled', !$(this).val());
 });
/* disable search, if the search field is empty /end */
});