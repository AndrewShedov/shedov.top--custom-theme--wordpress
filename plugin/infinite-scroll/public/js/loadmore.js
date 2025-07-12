document.addEventListener("DOMContentLoaded", function () {
  const isSearch = !!document.querySelector(".search_title");
  let canBeLoaded = true;
  const bottomOffset = 2000;
  const loadmoreImage = infinite_scroll_loadmore_params.loadmore_image;

  let mainDivSelector =
    document.querySelector(".posts__categories_side__wrap") ?
      ".posts__categories_side__wrap" :
      document.querySelector(".posts_categories_side_wrap__categories_page") ?
        ".posts_categories_side_wrap__categories_page" :
        ".posts_categories_side_wrap__search_page";

  let innerDivSelector =
    document.querySelector(".posts__categories_side__wrap") ||
    document.querySelector(".posts_categories_side_wrap__categories_page") ?
      ".post" : ".post_in_search_wrap";

  const mainDiv = document.querySelector(mainDivSelector);

  function getScrollTop() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }

  function getDocumentHeight() {
    return Math.max(
      document.body.scrollHeight, document.documentElement.scrollHeight,
      document.body.offsetHeight, document.documentElement.offsetHeight,
      document.body.clientHeight, document.documentElement.clientHeight
    );
  }

  function showLoader() {
    const loader = document.createElement("span");
    loader.className = "infinite_scroll_loader";
    loader.innerHTML = `<img src="${loadmoreImage}" alt="Loading...">`;
    mainDiv.parentElement.appendChild(loader);
  }

  function removeLoader() {
    const loader = document.querySelector(".infinite_scroll_loader");
    if (loader) loader.remove();
  }

  function fetchPosts() {
    const baseQuery = structuredClone(infinite_scroll_loadmore_params.base_query);

    switch (infinite_scroll_loadmore_params.sort) {
      case "popular":
        baseQuery.meta_key = "views";
        baseQuery.orderby = "meta_value_num";
        baseQuery.order = "DESC";
        break;
      case "old":
        baseQuery.orderby = "date";
        baseQuery.order = "ASC";
        break;
      default:
        baseQuery.orderby = "date";
        baseQuery.order = "DESC";
        break;
    }

    const data = new FormData();
    data.append("action", "loadmore");
    data.append("is_search", isSearch);
    data.append("page", infinite_scroll_loadmore_params.current_page);
    data.append("query", JSON.stringify(baseQuery));

    showLoader();
    canBeLoaded = false;

    fetch(infinite_scroll_loadmore_params.ajaxurl, {
      method: "POST",
      body: data
    })
      .then(response => response.text())
      .then(html => {
        removeLoader();
        if (html.trim()) {
          const tempDiv = document.createElement("div");
          tempDiv.innerHTML = html;

          // find latest post in DOM
          const lastPost = mainDiv.querySelector(`${innerDivSelector}:last-of-type`);

          if (lastPost) {
            // insert after the last post
            lastPost.insertAdjacentHTML("afterend", html);
          } else {
            // fallback — if there are no posts yet
            mainDiv.insertAdjacentHTML("beforeend", html);
          }

          canBeLoaded = true;
          infinite_scroll_loadmore_params.current_page++;
        }
      });
  }

  window.addEventListener("scroll", function () {
    if (
      getScrollTop() > getDocumentHeight() - window.innerHeight - bottomOffset &&
      canBeLoaded
    ) {
      fetchPosts();
    }
  });
});
