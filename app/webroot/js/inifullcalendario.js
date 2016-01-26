  jQuery(document).ready(function() {

    "use strict";


    // Init FullCalendar external events
    $('#external-events .fc-event').each(function() {
      // store data so the calendar knows to render an event upon drop
      $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true, // maintain when user navigates (see docs on the renderEvent method)
        className: 'fc-event-' + $(this).attr('data-event') // add a contextual class name from data attr
      });

      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true, // will cause the event to go back to its
        revertDuration: 0 //  original position after the drag
      });

    });

    var Calendar = $('#calendar');
    var Picker = $('.inline-mp');

    // Init FullCalendar Plugin
    Calendar.fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      events: [{
          title: 'Sony Meeting',
          start: '2015-05-4',
          end: '2015-05-6',
          className: 'fc-event-success',
        }, {
          title: 'Conference',
          start: '2015-05-14',
          end: '2015-05-16',
          className: 'fc-event-warning'
        }, {
          title: 'System Testing',
          start: '2015-05-26',
          end: '2015-05-28',
          className: 'fc-event-primary'
        },
      ],
      viewRender: function(view) {
        // If monthpicker has been init update its date on change
        if (Picker.hasClass('hasMonthpicker')) {
          var selectedDate = Calendar.fullCalendar('getDate');
          var formatted = moment(selectedDate, 'MM-DD-YYYY').format('MM/YY');
          Picker.monthpicker("setDate", formatted);
        }
        // Update mini calendar title
        var titleContainer = $('.fc-title-clone');
        if (!titleContainer.length) {
          return;
        }
        titleContainer.html(view.title);
      },
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function() {
        // is the "remove after drop" checkbox checked?
        if (!$(this).hasClass('event-recurring')) {
          $(this).remove();
        }
      },
      eventRender: function(event, element) {
        // create event tooltip using bootstrap tooltips
        $(element).attr("data-original-title", event.title);
        $(element).tooltip({
          container: 'body',
          delay: {
            "show": 100,
            "hide": 200
          }
        });
        // create a tooltip auto close timer  
        $(element).on('show.bs.tooltip', function() {
          var autoClose = setTimeout(function() {
            $('.tooltip').fadeOut();
          }, 3500);
        });
      }
    });

    // Init MonthPicker Plugin and Link to Calendar
    Picker.monthpicker({
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false,
      onSelect: function(selectedDate) {
        var formatted = moment(selectedDate, 'MM/YYYY').format('MM/DD/YYYY');
        Calendar.fullCalendar('gotoDate', formatted)
      }
    });


    // Init Calendar Modal via "inline" Magnific Popup
    $('#compose-event-btn').magnificPopup({
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks: {
        beforeOpen: function(e) {
          // we add a class to body indication overlay is active
          // We can use this to alter any elements such as form popups
          // that need a higher z-index to properly display in overlays
          $('body').addClass('mfp-bg-open');
          this.st.mainClass = this.st.el.attr('data-effect');
        },
        afterClose: function(e) {
          $('body').removeClass('mfp-bg-open');
        }
      },
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    // Calendar Modal Date picker
    $("#eventDate").datepicker({
      numberOfMonths: 1,
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false,
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }

    });


  });