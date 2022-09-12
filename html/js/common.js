// 共用 js
// 節流器
function throttle(func, timeout = 250) {
    let last;
    let timer;
   
    return function () {
      const context = this;
      const args = arguments;
      const now = +new Date();
   
      if (last && now < last + timeout) {
        clearTimeout(timer)
        timer = setTimeout(function () {
          last = now
          func.apply(context, args)
        }, timeout)
      } else {
        last = now
        func.apply(context, args)
      }
    }
}

function debounce(func, delay=250) {
    let timer = null;
   
    return () => {
        let context = this;
        let args = arguments;
    
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(context, args);
        }, delay)
    }
}


//header開關
$(function() {
    function closeNav() {
      console.log("close")
        $(".burger").removeClass("-open")
        $(".sub_nav").removeClass("-open")
        $(".nav_list__item").removeClass("-open")
        $("html,body").removeClass("locked")    //20220701修改
        $(".overlay").removeClass("active")
        $(".sub_nav_en").removeClass("-open")
    }

    $(".burger").on("click", function() {
        $(this).toggleClass("-open")
        $(".sub_nav").toggleClass("-open")
        $(".nav_list__item").removeClass("-open")
        $("html,body").toggleClass("locked")    //20220701修改
        $(".overlay").toggleClass("active")

        // 英文版漢堡選單
        $(".sub_nav_en").toggleClass("-open")
    })

    $(".nav_list__item ").on("click", function() {
        $(this).toggleClass("-open")
    })

    // 點擊遮罩關閉sub_nav
    $(".overlay").on("click", throttle(closeNav))
    // 瀏覽器視窗變動時關閉sub_nav
    $(window).resize(throttle(closeNav))

})

// 20220701新增 控制.sub_nav最大高度 Alvin
$(function() {
  let maxHeight = $(window).innerHeight();
  console.log(maxHeight - 90)
  $(".sub_nav").css("max-height", maxHeight - 90)
  $(window).on("resize", () => {
    height = $(window).innerHeight;
    $(".sub_nav").css("max-height", maxHeight - 90)
  });
})