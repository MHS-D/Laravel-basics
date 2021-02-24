// START: Add Choice Field
    $('#add-choice-field').click(function()
    {
        $('#no-choices-text').remove();
        $('button[name="field_choices"]').removeClass('d-none');

        var choice_id = Date.now();

        $('#choices-container').append(
                '<div class="form-group row" id="choice-div-' + choice_id + '">'
                + '<label for="" class="col-md-4 col-form-label">Option</label>'
                + '<div class="col-md-4">'
                    + '<input type="text" maxLength="50" class="form-control" id="choice-' + choice_id + '" name="choices[new][]" value="" required>'
                + '</div>'
                + '<div class="col-md-2">'
                    + '<button type="button" choice_id="' + choice_id + '" class="remove-choice btn btn-danger btn-just-icon btn-sm"><i class="material-icons">delete</i></button>'
                + '</div>'
            + '</div>'
        );
    });
// END: Add Choice Field

// START: Remove Old Choice
    // $('.remove-choice').on('click', function() // Does not work on new creatd elements
    $(document).on('click', '.remove-choice', function()
    {
        var choice_id = $(this).attr('choice_id');
        var name_attr = $('#choice-' + choice_id).attr('name');

        if (name_attr == undefined) return;

        // Remove Old Choice
        if (name_attr.includes('old'))
        {
            $('#choice-' + choice_id).attr('name', 'choices[deleted][' + choice_id + ']');
            $('#choice-' + choice_id).prop('readonly', true);
            $('#choice-' + choice_id).fadeTo('sloww', 0.5);

            // Change Icon
            $(this).html('<i class="material-icons">replay</i>');
        }
        // Restore Removed Old Choice
        else if (name_attr.includes('deleted'))
        {
            $('#choice-' + choice_id).attr('name', 'choices[old][' + choice_id + ']');
            $('#choice-' + choice_id).prop('readonly', false);
            $('#choice-' + choice_id).fadeTo('sloww', 1);

            // Change Icon
            $(this).html('<i class="material-icons">delete</i>');
        }
        // Remove New Choice
        else if (name_attr.includes('new'))
        {
            $('#choice-div-' + choice_id).remove();
        }
    });
// END: Remove Old Choice

// START: Tabs Set Active Link
    tabs_set_active_link();
    function tabs_set_active_link()
    {
        if (document.getElementById("tabs") != null)
        {        
            var lis = document.getElementById("tabs").getElementsByTagName("li");
            Object.entries(lis).forEach(function (item)
            {
                nav_item = $(item[1]);
                id = nav_item[0].id;
                if (id != '' && window.location.href.indexOf(id) > -1)
                {
                    $('#' + id).addClass('active');
                }
                else
                {
                    if (id != '')
                    {
                        $('#' + id).removeClass('active');
                    }
                }
            });
        }
        else
        {
            setTimeout(function () {
                tabs_set_active_link();
            }, 10); // We wait because the "tabs" id is not found first time
        }
    }
// END: Tabs Set Active Link

// START: DataTable
    $(document).ready( function () {
        var dataTable = $('.dataTable').DataTable(
            {
                "scrollX": true
            }
        );

        dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
// END: DataTable

// START: Smooth Scroll
$(document).ready(function() // Reference: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_smooth_scroll_jquery
{
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
            
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});
// END: Smooth Scroll