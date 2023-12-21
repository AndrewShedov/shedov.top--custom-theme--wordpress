document.addEventListener("DOMContentLoaded", function () {

// adaptation to different screens admin bar /Start
// in the header
  if (document.body.classList.contains('admin-bar')) {
  let wpAdminbarHeight = document.getElementById('wpadminbar').offsetHeight;
  document.getElementById("nav_wrap_0").style.marginTop = wpAdminbarHeight+"px", document.getElementById("mobile_nav_wrap_2").style.marginTop = wpAdminbarHeight+"px", document.getElementById("mobile_nav_wrap_1").style.top = wpAdminbarHeight+"px", document.getElementById("nav_wrap_1").style.top = wpAdminbarHeight+"px"
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
      copyBtn.innerHTML = `<svg width="27px" height="27px" fill="none" stroke="#292929" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="ch-code-button"><title>Copy</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6px" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>`;
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
            btn.innerHTML = `<svg fill="#292929" width="23px" height="23px" viewBox="2 -2 24 24" id="check-mark-square-2" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color"><polyline id="secondary" points="21 5 12 14 8 10" style="fill: none; stroke: #292929; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline><path id="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: #292929; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>`;
            btn.setAttribute('style', 'opacity: 1');

          },
          () => alert('failed to copy'),
        );

      setTimeout(() => {
        btn.removeAttribute('style');
        btn.innerHTML = `<svg width="27px" height="27px" fill="none" stroke="#292929" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="ch-code-button"><title>Copy</title><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6px" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>`;
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
    element.addEventListener("click", function () {
      const href = element.getAttribute('data-href');
      navigator.clipboard.writeText(href);
      document.getElementById("single_share_copy_notification").textContent =
        "Скопировано";

      document.getElementById("single_share_copy_notification").style.width =
        "85px";

      document.getElementById(
        "single_share_copy_notification"
      ).style.marginLeft = "-47px";
    });
  });

  document.querySelectorAll(".single_share_copy_icon").forEach((element) => {
    element.addEventListener("mouseover", function () {
      document.getElementById("single_share_copy_notification").textContent =
        "Копировать";

      document.getElementById("single_share_copy_notification").style.width =
        "75px";

      document.getElementById(
        "single_share_copy_notification"
      ).style.marginLeft = "-42px";
    });
  });

  /* single_share_link 2 */
  /* single.php 2 */

  /*index.php 1*/
  /* entry cell share 1 */
  /*share list open/close 1*/
  const ob = document.querySelector("html");
  ob.addEventListener("click", (e) => {
    const o = e.target.closest(".entry_cell_share");
    if (!o) {
      if (e.target.closest(".entry_cell_share_list_wrap")) return;
      ob.querySelectorAll(".entry_cell_share_list_wrap.show").forEach((el) =>
        animateDisplay(el, "show", "block", 150)
      );
      return;
    }
    const op = e.target.closest(".entry_cell_share_wrap");

    const el = op.querySelector(".entry_cell_share_list_wrap");
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
  /* entry cell share 2 */

  /* entry cell share link 1 */

  ob.addEventListener("click", (e) => {

    const o = e.target.closest(".entry_cell_share_link_wrap");
    if (!o) {
      ob.querySelectorAll(".entry_cell_share_link_wrap").forEach((element) => {
        element.addEventListener("click", function () {
          const href = element.getAttribute('data-href');
          navigator.clipboard.writeText(href);
          element.parentElement
            .querySelector(".entry_cell_share_link")
            .querySelector("p").textContent = "Скопировано";
          element.parentElement
            .querySelector(".entry_cell_share_link")
            .querySelector("i").style.marginRight = "7px";
        });
      });
      return;
    }
  });

  ob.addEventListener("click", (e) => {
    const o = e.target.closest(".entry_cell_share_link_wrap");
    if (!o) {
      ob.querySelectorAll(".entry_cell_share_link_wrap").forEach((element) => {
        element.addEventListener("mouseover", function () {
          element.parentElement
            .querySelector(".entry_cell_share_link")
            .querySelector("p").textContent = "Копировать";

          element.parentElement
            .querySelector(".entry_cell_share_link")
            .querySelector("i").style.marginRight = "10px";
        });
      });
      return;
    }
  });

  /* entry cell share link 2 */
  /*index.php 2*/

  let burger = document.getElementById("burger");

  let mobile_Side_burger = document.getElementById("mobile_Side_burger");

  let menu = document.getElementById("menu");
  let BodyHiddenOver = document.body;
  ///////////////Function opening menu
  function calcShowMenu(showMenu) {
    burger.classList.toggle("burger-open", showMenu);

    mobile_Side_burger.classList.toggle("burger-open", showMenu);

    menu.classList.toggle("menu-open", showMenu);
    menu.classList.toggle("menuMoveLeft", showMenu);
    menu.classList.toggle("menu_shadow", showMenu);
    BodyHiddenOver.classList.toggle("BodyHiddenOver", showMenu);
  }

  let showMenu = false;

  /////////////////Pressing a Burger
  burger.addEventListener("click", () => calcShowMenu((showMenu = !showMenu)));

  mobile_Side_burger.addEventListener("click", () =>
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

  /*Menu scrolling 1*/
  window.onscroll = function () {
    growShrinkLogo();
  };

  function growShrinkLogo() {
    let li = document.querySelectorAll(".nav ul li");
    let = mobile_nav_wrap_3 = document.querySelectorAll(".mobile_nav_wrap_3");
    let = nav_wrap_2 = document.querySelectorAll(".nav_wrap_2");
    let logo = document.querySelectorAll(".nav_logo_wrap");
    if (
      document.body.scrollTop > 50 ||
      document.documentElement.scrollTop > 50
    ) {
      nav_wrap_2.forEach((el) => (el.style.marginBottom = "2px"));
      li.forEach((el) => (el.style.height = "40px"));
      logo.forEach((el) => (el.style.height = "50px"));
    } else {
      nav_wrap_2.forEach((el) => (el.style.marginBottom = "0px"));
      li.forEach((el) => (el.style.height = "45px"));
      logo.forEach((el) => (el.style.height = "70px"));
    }
  }

  /*Menu scrolling 2*/

  ///////////////scrol when you click on the title
  const smoothLinks = document.querySelectorAll('a[href^="#"]');
  for (let smoothLink of smoothLinks) {
    smoothLink.addEventListener("click", function (e) {
      const id = smoothLink.getAttribute("href");
      document.querySelector(id).scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
      e.preventDefault();
    });
  }
  let number_class = document.getElementsByClassName("entry_cell_wrap").length;

  function NumberClass() {
    let entry = document.getElementsByClassName("entry")[0];

    if (number_class < 2) {
      entry.setAttribute("style", "justify-content:center;");
    }
  }

  if (document.querySelector(".entry")) {
    return NumberClass();
  }
});

jQuery(document).ready(function ($) {
  /* UP BUTTON */
  let offset = 100;
  let speed = 120;
  let duration = 400;
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

  /*Search_1*/
  $(".search_open").hide();

  $(".toggle-block").click(function () {
    if ($(".search_open").is(":visible")) {
      $(".search_open").fadeOut(150);
    } else {
      $(".search_open").fadeIn(150);

      $("#search_input_focus").focus();
    }
  });


  jQuery(function ($) {
    $(document).mouseup(function (e) {
      let div = $("#search_open");
      if (
        !div.is(e.target) &&
        div.has(e.target).length === 0
      ) {

        div.fadeOut(150);
      }
    });
  });

  $(".nav_search_button_clear").hide(150);

  setInterval(function () {
    if ($("#search_input_focus").val().length != 0) {
      $(".nav_search_button_clear").fadeIn(150);
    } else {
      $(".nav_search_button_clear").fadeOut(150);
    }
  }, 0);

  /*Search_2*/

  /*Search_mobile(1)_1*/
  $(".mobile_1_search_open").hide();

  $(".mobile_1_toggle-block").click(function () {
    if ($(".mobile_1_search_open").is(":visible")) {
      $(".mobile_1_search_open").fadeOut(150);
    } else {
      $(".mobile_1_search_open").fadeIn(150);

      $("#mobile_1_search_input_focus").focus();
    }
  });

  jQuery(function ($) {
    $(document).mouseup(function (e) {
      let div = $("#mobile_1_search_open");
      if (
        !div.is(e.target) &&
        div.has(e.target).length === 0
      ) {
        div.fadeOut(150);
      }
    });
  });

  $(".mobile_1_nav_search_button_clear").hide(150);

  setInterval(function () {
    if ($("#mobile_1_search_input_focus").val().length != 0) {
      $(".mobile_1_nav_search_button_clear").fadeIn(150);

    } else {

      $(".mobile_1_nav_search_button_clear").fadeOut(150);
    }
  }, 0);

  /*Search_mobile(1)_2*/

  /* HIDE ICONS IN THE HEADER ON THE CONTACT PAGE 1*/

  if (document.querySelector(".Contacts_Icons_Wrap")) {

    $(".header_social_wrap").hide("slow");
  }

  if (document.querySelector(".Contacts_Icons_Wrap")) {
    $(".mobile_header_social_wrap").hide("slow");
  }

  if ($(".similar_news_cell").length) {
    $("#similar_news_wrap_1").css("display", "block");
  }

  if ($(".comments-area").length) {
    $("#single_number_comments_wrap").css("display", "block");
  }

});