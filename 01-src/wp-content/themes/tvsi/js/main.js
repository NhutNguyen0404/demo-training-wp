function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /* Make an HTTP request using the attribute value as the file name: */
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
          if (this.status == 200) {
            elmnt.innerHTML = this.responseText;
          }
          if (this.status == 404) {
            elmnt.innerHTML = "Page not found.";
          }
          /* Remove the attribute, and call this function once more: */
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      /* Exit the function: */
      return;
    }
  }
}

$(window).ready(() => {
  // Home slider

  includeHTML();
  $(".owl-slider").owlCarousel({
    loop: true,
    // autoplay: true,
    nav: true,
    navText: [
      '<img src="/wp-content/themes/tvsi/images/ic-slider-prev.svg" alt="icon prev slider"/>',
      '<img src="/wp-content/themes/tvsi/images/ic-slider-next.svg" alt="icon next slider"/>',
    ],
    dots: true,
    items: 1,
  });

  // Show info usa
  $('.js-open-info').hide();
  $("input[name$='accountInfoUsa']").click(function() {
      if ($(this).val() === 'info') {
        $('.js-open-info').show();
      } else {
        $('.js-open-info').hide();
      }
  });

  // Carousel about journey
  $(".journey-bar").slick({
    centerMode: true,
    dots: false,
    infinite: true,
    autoplay: true,
    slidesToShow: 2,
    asNavFor: ".labels",
    responsive: [
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".labels").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    draggable: false,
    asNavFor: ".journey-bar",
  });

  //slider finance
  $(".finance-tabs--slide").slick({
    centerMode: false,
    dots: false,
    infinite: true,
    autoplay: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1366,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 560,
        settings: {
          slidesToShow: 1,
          infinite: false
        },
      }
    ],
  });

  //slider customer
  $(".highlight-customer__list--slider").slick({
    centerMode: true,
    dots: false,
    infinite: true,
    autoplay: true,
    slidesToShow: 5,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  $(document).on('click', '.job-item-icon', function () {
    $(this).closest('.job-item').find('.job-item__content').toggle(300);
    if ($(this).closest('.job-item').hasClass('active')) {
      $(this).closest('.job-item').removeClass('active');
    } else {
      $(this).closest('.job-item').addClass('active');
    }
  })

  $(document).on('click', '.tab__item', function () {
    let target = $(this).data('target');
    $('.tab__item').removeClass('active');
    $(this).addClass('active');
    $('.tab-content .tab-content__item').removeClass('active');
    $(target).addClass('active');
  })

  // Tab to dropdown
  const $tabsToDropdown = $(".tabs-to-dropdown");

  function generateDropdownMarkup(container) {
    const $navWrapper = container.find(".nav-wrapper");
    const $navPills = container.find(".nav-pills");
    const firstTextLink = $navPills.find("li:first-child a").text();
    const $items = $navPills.find("li");
    const markup = `
    <div class="dropdown d-md-none">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ${firstTextLink}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
        ${generateDropdownLinksMarkup($items)}
      </div>
    </div>
  `;
    $navWrapper.prepend(markup);
  }

  function generateDropdownLinksMarkup(items) {
    let markup = "";
    items.each(function () {
      const textLink = $(this).find("a").text();
      markup += `<a class="dropdown-item" href="#">${textLink}</a>`;
    });

    return markup;
  }

  function showDropdownHandler(e) {
    // works also
    //const $this = $(this);
    const $this = $(e.target);
    const $dropdownToggle = $this.find(".dropdown-toggle");
    const dropdownToggleText = $dropdownToggle.text().trim();
    const $dropdownMenuLinks = $this.find(".dropdown-menu a");
    const dNoneClass = "d-none";
    $dropdownMenuLinks.each(function () {
      const $this = $(this);
      if ($this.text() == dropdownToggleText) {
        $this.addClass(dNoneClass);
      } else {
        $this.removeClass(dNoneClass);
      }
    });
  }

  function clickHandler(e) {
    e.preventDefault();
    const $this = $(this);
    const index = $this.index();
    const text = $this.text();
    $this.closest(".dropdown").find(".dropdown-toggle").text(`${text}`);
    $this
      .closest($tabsToDropdown)
      .find(`.nav-pills li:eq(${index}) a`)
      .tab("show");
  }

  function shownTabsHandler(e) {
    // works also
    //const $this = $(this);
    const $this = $(e.target);
    const index = $this.parent().index();
    const $parent = $this.closest($tabsToDropdown);
    const $targetDropdownLink = $parent.find(".dropdown-menu a").eq(index);
    const targetDropdownLinkText = $targetDropdownLink.text();
    $parent.find(".dropdown-toggle").text(targetDropdownLinkText);
  }

  $tabsToDropdown.each(function () {
    const $this = $(this);
    const $pills = $this.find('a[data-toggle="pill"]');

    generateDropdownMarkup($this);

    const $dropdown = $this.find(".dropdown");
    const $dropdownLinks = $this.find(".dropdown-menu a");

    $dropdown.on("show.bs.dropdown", showDropdownHandler);
    $dropdownLinks.on("click", clickHandler);
    $pills.on("shown.bs.tab", shownTabsHandler);
  });

  $(".owl-product").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 3
      }
    }
  });

  // Fixed header
  $(".js-logo-fixed, .js-open-account").hide();
  $(window).scroll(function () {
    let sticky = $(".js-page-header"),
      scroll = $(window).scrollTop();

    if (scroll > 1) {
      sticky.addClass("fixed-header");
      $(".js-logo-fixed, .js-open-account").show();
    } else {
      sticky.removeClass("fixed-header");
      $(".js-logo-fixed, .js-open-account").hide();
    }
  });

  // make it as accordion for smaller screens
  if ($(window).width() < 992) {
    $("#main-menu .dropdown-menu").on("click", function (event) {
      event.stopPropagation();
    });
    $("#main-menu .dropdown-menu a").click(function (e) {
      if ($(this).attr("href") == "#") {
        e.preventDefault();
      }
      if ($(this).next(".submenus").length) {
        $(this).next(".submenus").toggle();
      }
      $(".dropdown").on("hide.bs.dropdown", function () {
        $(this).find(".submenus").hide();
      });
    });
  }

  // Language dropdown select
  $(".lang-flag, .js-language").click(function () {
    $(".language-dropdown").toggleClass("open");
  });
  $("ul.lang-list li").click(function () {
    $("ul.lang-list li").removeClass("selected");
    $(this).addClass("selected");
    if ($(this).hasClass("lang-en")) {
      $(".language-dropdown")
        .find(".lang-flag")
        .addClass("lang-en")
        .removeClass("lang-vi");
    } else if ($(this).hasClass("lang-vi")) {
      $(".language-dropdown")
        .find(".lang-flag")
        .addClass("lang-vi")
        .removeClass("lang-en");
    }
    $(".language-dropdown").removeClass("open");
  });

  $("#navbarResponsive").on("show.bs.collapse", function () {
    $(".js-quick-links").css({ zIndex: 10 });
  });

  $("#navbarResponsive").on("hide.bs.collapse", function () {
    $(".js-quick-links").css({ zIndex: 1050 });
  });

  $(".js-quick-links").on("show.bs.dropdown", function () {
    $("body, html").css({ overflowY: "hidden" });
  });

  $(".js-quick-links").on("hide.bs.dropdown", function () {
    $("body, html").css({ overflowY: "auto" });
  });

  // Slider carousel image document page
  const imageGrid = document.querySelector(".image-grid");
  if (imageGrid) {
    const links = imageGrid.querySelectorAll("a");
    const imgs = imageGrid.querySelectorAll("img");
    const lightboxModal = document.getElementById("lightbox-modal");
    const bsModal = new bootstrap.Modal(lightboxModal);
    const modalBody = document.querySelector(".modal-body .container-fluid");

    for (const link of links) {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const currentImg = link.querySelector("img");
        const lightboxCarousel = document.getElementById("lightboxCarousel");
        if (lightboxCarousel) {
          const parentCol = link.parentElement.parentElement;
          const index = [...parentCol.parentElement.children].indexOf(parentCol);
          const bsCarousel = new bootstrap.Carousel(lightboxCarousel);
          bsCarousel.to(index);
        } else {
          createCarousel(currentImg);
        }
        bsModal.show();
      });
    }
  
    function createCarousel(img) {
      modalBody.innerHTML = `
        <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-interval="false">
          <div class="carousel-inner">
            ${createSlides(img)}
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        `;
    }
  
    function createSlides(img) {
      let markup = "";
      const currentImgSrc = img.getAttribute("src");
  
      for (const img of imgs) {
        const imgSrc = img.getAttribute("src");
        const imgAlt = img.getAttribute("alt");
        const imgCaption = img.getAttribute("data-caption");
  
        markup += `
        <div class="carousel-item${currentImgSrc === imgSrc ? " active" : ""}">
          <img src=${imgSrc} alt=${imgAlt}>
        </div>
        `;
      }
  
      return markup;
    }
  }

});
