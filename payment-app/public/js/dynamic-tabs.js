$(document).ready(function() {
    let navbarArray = ['/'];
    var activeLink = null;

    function setCurrentTab(){
      let currentLink =  `${window.currentLink}`;
      console.log(currentLink);     
      if(currentLink != 'welcome'){
          $('.tab').removeClass('active-navigation');
      $('.tab-items').append(`<li data-link='${currentLink}' class='padding-right-30px tab breadcrumb-item link${currentLink}'><a class='link-${currentLink}' href='#/${currentLink}'>${currentLink}</a><img data-parent="${currentLink}" 
      class="cancel-icon closeMe" src="dist/img/icons/cancel.png"/></li>`);
      $(`.link-${currentLink}`)[0].click();
      $(`.link${currentLink}`).addClass('active-navigation');
    }
    }
     setCurrentTab();
   
   $("body").on('click','.navLink',function(){
       let link = $(this).data('link');
       activeLink = link;
       console.log("The current link is:",link)
       let index = navbarArray.indexOf(link);
              if(index==-1){
                  console.log("before clicking",navbarArray);
                  navbarArray.push(link)
                  console.log("after clicking",navbarArray);
                 // $('.top-right').append(`<a data-link="${link}" class="link${link} link" href="#/${link}">${link}  <span data-parent="${link}" class="closeMe" href="#">X</span> </a>`);
                  $('.tab-items').append(`<li data-link='${link}' class='padding-right-30px tab breadcrumb-item link${link}'><a class='link-${link}' href='#/${link}'>${link}</a><img data-parent="${link}" 
                                                class="cancel-icon closeMe" src="dist/img/icons/cancel.png"/></li>`);
                                                $('.tab').removeClass('active-navigation');
                                                $(`.link${link}`).addClass('active-navigation');
              }
              else{
                  console.log(index);
              }
   });

   $(document).on('click','.tab',function(){
         var link = $(this).data('link');
         $(`.link-${link}`)[0].click();
         $('.tab').removeClass('active-navigation');
         $(`.link${link}`).addClass('active-navigation');
   });

   $(document).on('click', '.closeMe', function() {
        var nav = $(this).data('parent');
        var el = `.link${nav}`;
        console.log(activeLink,nav);
        navIndex = navbarArray.indexOf(nav);
        console.log("before removing",navbarArray,"Index to remove:", navIndex);
        navbarArray.splice(navbarArray.indexOf(nav), 1);
        console.log("after removing",navbarArray);
        if(nav == activeLink){
            console.log("clicked previous link");
           // console.log($(el).prev().attr("class"));
            $(el).prev()[0].click();
        }

        $(el).remove();
      
        return false;

   });
  
  });