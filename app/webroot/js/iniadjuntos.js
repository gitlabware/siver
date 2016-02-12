
var dropdownFilter = {
    // Declare any variables we will need as properties of the object
    $filters: null,
    $reset: null,
    groups: [],
    outputArray: [],
    outputString: '',
    // The "init" method will run on document ready and cache any jQuery objects we will need.
    init: function () {
        var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "dropdownFilter" object so that we can share methods and properties between all parts of the object.

        self.$filters = $('#select-filters');
        self.$reset = $('#mix-reset');
        self.$container = $('#mix-container');

        self.$filters.find('fieldset').each(function () {
            self.groups.push({
                $dropdown: $(this).find('select'),
                active: ''
            });
        });

        self.bindHandlers();
    },
    // The "bindHandlers" method will listen for whenever a select is changed. 
    bindHandlers: function () {
        var self = this;

        // Handle select change    
        self.$filters.on('change', 'select', function (e) {
            e.preventDefault();

            self.parseFilters();
        });

        // Handle reset click
        self.$reset.on('click', function (e) {
            e.preventDefault();

            self.$filters.find('select').val('');

            self.parseFilters();
        });
    },
    // The parseFilters method pulls the value of each active select option
    parseFilters: function () {
        var self = this;

        // loop through each filter group and grap the value from each one.
        for (var i = 0, group; group = self.groups[i]; i++) {
            group.active = group.$dropdown.val();
        }

        self.concatenate();
    },
    // The "concatenate" method will crawl through each group, concatenating filters as desired:
    concatenate: function () {
        var self = this;

        self.outputString = ''; // Reset output string

        for (var i = 0, group; group = self.groups[i]; i++) {
            self.outputString += group.active;
        }

        // If the output string is empty, show all rather than none:
        !self.outputString.length && (self.outputString = 'all');

        //console.log(self.outputString); 
        // ^ we can check the console here to take a look at the filter string that is produced

        // Send the output string to MixItUp via the 'filter' method:
        if (self.$container.mixItUp('isLoaded')) {
            self.$container.mixItUp('filter', self.outputString);
        }
    }
};

// To keep our code clean and modular, all custom functionality will be contained inside a single object literal called "checkboxFilter".
var checkboxFilter = {
    // Declare any variables we will need as properties of the object
    $filters: null,
    $reset: null,
    groups: [],
    outputArray: [],
    outputString: '',
    // The "init" method will run on document ready and cache any jQuery objects we will need.
    init: function () {
        var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "checkboxFilter" object so that we can share methods and properties between all parts of the object.

        self.$filters = $('#checkbox-filters');
        self.$reset = $('#mix-reset2');
        self.$container = $('#mix-container');

        self.$filters.find('fieldset').each(function () {
            self.groups.push({
                $inputs: $(this).find('input'),
                active: [],
                tracker: false
            });
        });

        self.bindHandlers();
    },
    // The "bindHandlers" method will listen for whenever a form value changes. 
    bindHandlers: function () {
        var self = this;

        self.$filters.on('change', function () {
            self.parseFilters();
        });

        self.$reset.on('click', function (e) {
            e.preventDefault();
            self.$filters[0].reset();
            self.parseFilters();
        });
    },
    // The parseFilters method checks which filters are active in each group:
    parseFilters: function () {
        var self = this;

        // loop through each filter group and add active filters to arrays
        for (var i = 0, group; group = self.groups[i]; i++) {
            group.active = []; // reset arrays
            group.$inputs.each(function () {
                $(this).is(':checked') && group.active.push(this.value);
            });
            group.active.length && (group.tracker = 0);
        }

        self.concatenate();
    },
    // The "concatenate" method will crawl through each group, concatenating filters as desired:
    concatenate: function () {
        var self = this,
                cache = '',
                crawled = false,
                checkTrackers = function () {
                    var done = 0;

                    for (var i = 0, group; group = self.groups[i]; i++) {
                        (group.tracker === false) && done++;
                    }

                    return (done < self.groups.length);
                },
                crawl = function () {
                    for (var i = 0, group; group = self.groups[i]; i++) {
                        group.active[group.tracker] && (cache += group.active[group.tracker]);

                        if (i === self.groups.length - 1) {
                            self.outputArray.push(cache);
                            cache = '';
                            updateTrackers();
                        }
                    }
                },
                updateTrackers = function () {
                    for (var i = self.groups.length - 1; i > -1; i--) {
                        var group = self.groups[i];

                        if (group.active[group.tracker + 1]) {
                            group.tracker++;
                            break;
                        } else if (i > 0) {
                            group.tracker && (group.tracker = 0);
                        } else {
                            crawled = true;
                        }
                    }
                };

        self.outputArray = []; // reset output array

        do {
            crawl();
        }
        while (!crawled && checkTrackers());

        self.outputString = self.outputArray.join();

        // If the output string is empty, show all rather than none:
        !self.outputString.length && (self.outputString = 'all');

        //console.log(self.outputString); 
        // ^ we can check the console here to take a look at the filter string that is produced

        // Send the output string to MixItUp via the 'filter' method:
        if (self.$container.mixItUp('isLoaded')) {
            self.$container.mixItUp('filter', self.outputString);
        }
    }
};

// Init multiselect plugin on filter dropdowns
$('#filter1').multiselect({
    buttonClass: 'btn btn-default',
});
$('#filter2').multiselect({
    buttonClass: 'btn btn-default',
});

// Init checkboxFilter code
checkboxFilter.init();

// Init dropdownFilter code
dropdownFilter.init();

var $container = $('#mix-container'), // mixitup container
        $toList = $('.to-list'), // list view button
        $toGrid = $('.to-grid'); // list view button

// Instantiate MixItUp
$container.mixItUp({
    controls: {
        enable: false // we won't be needing these
    },
    animation: {
        duration: 400,
        effects: 'fade translateZ(-360px) stagger(45ms)',
        easing: 'ease'
    },
    callbacks: {
        onMixFail: function () {
        }
    }
});

$toList.on('click', function () {
    if ($container.hasClass('list')) {
        return
    }
    $container.mixItUp('changeLayout', {
        display: 'block',
        containerClass: 'list'
    }, function (state) {
        // callback function
    });
});
$toGrid.on('click', function () {
    if ($container.hasClass('grid')) {
        return
    }
    $container.mixItUp('changeLayout', {
        display: 'inline-block',
        containerClass: 'grid'
    }, function (state) {
        // callback function
    });
});




function cargarmodal2(dir_e) {
    if (typeof largo === 'undefined') {
        $('#mimodal').removeClass('popup-lg');
    } else {
        $('#mimodal').addClass('popup-lg');
    }

    jQuery("#spin-cargando-mod").show();
    jQuery("#divmodal").hide();
    $.magnificPopup.open({
        removalDelay: 500, //delay removal by X to allow out-animation,
        items: {
            src: '#mimodal'
        },
        // overflowY: 'hidden', // 
        callbacks: {
            beforeOpen: function (e) {
                this.st.mainClass = 'mfp-zoomIn';
            },
            close: function () {
                $('#mimodal').removeClass('div-ocho');
            }
        },
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });


    $.ajax(
            {
                url: formURL_E,
                type: "POST",
                data: 'direccion=' + direccion_e + '&nombre=' + dir_e,
                success: function (data, textStatus, jqXHR)
                {
                    //data: return data from server
                    $("#divmodal").html(data);

                },
                complete: function () {
                    jQuery("#spin-cargando-mod").hide(500);
                    jQuery("#divmodal").show();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    //if fails   
                    alert("error");
                }
            });
    /*jQuery("#divmodal").load(urll, function (responseText, textStatus, req) {
     if (textStatus == "error")
     {
     alert("error!!!");
     }
     else {
     jQuery("#spin-cargando-mod").hide(500);
     jQuery("#divmodal").show();
     }
     });*/



}


