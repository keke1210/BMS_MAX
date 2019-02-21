//Number Picker Plugin - TobyJ
(function ($) {
    $.fn.numberPicker = function() {
      var dis = 'disabled';
      return this.each(function() {
        var picker = $(this),
            p = picker.find('button:last-child'),
            m = picker.find('button:first-child'),
            input = picker.find('input'),                 
            min = parseInt(input.attr('min'), 10),
            max = parseInt(input.attr('max'), 10),
            inputFunc = function(picker) {
              var i = parseInt(input.val(), 10);
              if ( (i <= min) || (!i) ) {
                input.val(min);
                p.prop(dis, false);
                m.prop(dis, true);
              } else if (i >= max) {
                input.val(max);
                p.prop(dis, true); 
                m.prop(dis, false);
              } else {
                p.prop(dis, false);
                m.prop(dis, false);
              }
            },
            changeFunc = function(picker, qty) {
              var q = parseInt(qty, 10),
                  i = parseInt(input.val(), 10);
              if ((i < max && (q > 0)) || (i > min && !(q > 0))) {
                input.val(i + q);
                inputFunc(picker);
              }
            };
        m.on('click', function(){changeFunc(picker,-1);});
        p.on('click', function(){changeFunc(picker,1);});
        input.on('change', function(){inputFunc(picker);});
        inputFunc(picker); //init
      });
    };
  }(jQuery));
  
  
  $(document).on('ready', function(){
    
    $('.plusminus').numberPicker();
    
    //add dynamically:
    $('<div class="plusminus horiz"><button></button><input type="number" name="qty" value="1" min="1" max="5"><button></button></div>').numberPicker().appendTo('span');
    
  });