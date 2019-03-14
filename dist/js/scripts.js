(function( $ ) {
    $( document ).ready(function() {
        $('.i2-pros-cons-color-picker').wpColorPicker();
        $(document).on("focusin", '.i2-pros-cons-icons input', function(event) { 
            bindIcons(this);
        });
        $('.i2-pros-cons-icons').each(function(){
            bindIcons(this);
        });
          function bindIcons(obj){
        $(obj).iconpicker({
            hideOnSelect: true,
            templates: {
                popover: '<div class="iconpicker-popover popover"><div class="arrow"></div>' +
                    '<div class="popover-title"></div><div class="popover-content"></div></div>',
                footer: '<div class="popover-footer"></div>',
                buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' +
                    ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
                search: null,
                iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
                iconpickerItem: '<a role="button" href="#" class="iconpicker-item"><i></i></a>',
            },
            icons: [
                {
                    title: "icon icon-check-1",
                    searchTerms: ['web']
                },
                {
                    title: "icon icon-check-2",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-check-3",
                    searchTerms: ['style']
                },   
                {
                    title: "icon icon-check-4",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-check-5",
                    searchTerms: ['style']
                },  
                {
                    title: "icon icon-square-1",
                    searchTerms: ['web']
                },
                {
                    title: "icon icon-square-2",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-square-3",
                    searchTerms: ['style']
                },  
                {
                    title: "icon icon-ban-1",
                    searchTerms: ['web']
                },
                {
                    title: "icon icon-ban-2",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-ban-3",
                    searchTerms: ['style']
                },   
                {
                    title: "icon icon-ban-4",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-ban-5",
                    searchTerms: ['style']
                },   
                {
                    title: "icon icon-thumbs-up",
                    searchTerms: ['web']
                },
                {
                    title: "icon icon-thumbs-down",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-thumbs-o-up",
                    searchTerms: ['style']
                },   
                {
                    title: "icon icon-thumbs-o-down",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-thumbs-s-up",
                    searchTerms: ['style']
                },   
                {
                    title: "icon icon-thumbs-s-down",
                    searchTerms: ['style']
                },     
                {
                    title: "icon icon-cancle",
                    searchTerms: ['style']
                }, 
                {
                    title: "icon icon-cancle-2",
                    searchTerms: ['style']
                },   
                {
                    title: "icon icon-cancle-3",
                    searchTerms: ['style']
                }             
            ]
          });
        }
    });     
})( jQuery );