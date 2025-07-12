document.addEventListener("DOMContentLoaded", function () {
  const isSearch = !!document.querySelector(".search_title");
  let canBeLoaded = true;
  const bottomOffset = 2000;

  const mainDivSelector =
    document.querySelector(".posts__categories_side__wrap")
      ? ".posts__categories_side__wrap"
      : document.querySelector(".posts_categories_side_wrap__categories_page")
        ? ".posts_categories_side_wrap__categories_page"
        : ".posts_categories_side_wrap__search_page";

  if (!mainDivSelector) return;
  const mainDiv = document.querySelector(mainDivSelector);
  if (!mainDiv) return;

  let innerDivSelector = ".post_in_search_wrap";
  if (
    document.querySelector(".posts__categories_side__wrap") ||
    document.querySelector(".posts_categories_side_wrap__categories_page")
  ) {
    innerDivSelector = ".post";
  }

  const loadmoreImage = infinite_scroll_loadmore_params.loadmore_image;

  window.addEventListener("scroll", function () {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight;
    const winHeight = window.innerHeight;

    if (
      scrollTop + winHeight > docHeight - bottomOffset &&
      canBeLoaded &&
      infinite_scroll_loadmore_params.current_page < infinite_scroll_loadmore_params.max_page
    ) {
      let baseQuery = JSON.parse(infinite_scroll_loadmore_params.posts);

      if (infinite_scroll_loadmore_params.sort === "popular") {
        baseQuery.meta_key = "views";
        baseQuery.orderby = "meta_value_num";
        baseQuery.order = "DESC";
      } else if (infinite_scroll_loadmore_params.sort === "old") {
        baseQuery.orderby = "date";
        baseQuery.order = "ASC";
      } else {
        baseQuery.orderby = "date";
        baseQuery.order = "DESC";
      }

      const data = new FormData();
      data.append("action", "loadmore");
      data.append("is_search", isSearch);
      data.append("page", infinite_scroll_loadmore_params.current_page);
      data.append("query", JSON.stringify(baseQuery));

      const parentElement = mainDiv.parentElement;

      const loader = document.createElement("span");
      loader.className = "infinite_scroll_loader";
      const loaderImg = document.createElement("img");
      loaderImg.src = loadmoreImage;
      loader.appendChild(loaderImg);
      parentElement.appendChild(loader);

      canBeLoaded = false;

      fetch(infinite_scroll_loadmore_params.ajaxurl, {
        method: "POST",
        body: data,
      })
        .then((response) => response.text())
        .then((html) => {
          if (html) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, "text/html");
            const newElements = Array.from(doc.body.childNodes);
            const lastPost = mainDiv.querySelector(`${innerDivSelector}:last-of-type`);
            newElements.forEach((el) => {
              lastPost.insertAdjacentElement("afterend", el);
            });
            infinite_scroll_loadmore_params.current_page++;
            canBeLoaded = true;
          }
        })
        .finally(() => {
          const existingLoader = document.querySelector(".infinite_scroll_loader");
          if (existingLoader) existingLoader.remove();
        });
    }
  });
});
