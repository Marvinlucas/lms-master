jQuery(function () {
    $(".delete-item").submit(function (e) {
        if (!confirm("Are you sure to delete this item?")) {
            e.preventDefault();
            return false;
        }
    });
});

// Check if the DOM content has loaded
document.addEventListener("DOMContentLoaded", function () {
    const navItems = document.querySelectorAll(".nav-item");

    // Retrieve the current URL
    const currentURL = window.location.href;

    // Remove active class from all items and add to the matching link
    navItems.forEach((item) => {
        const itemLink = item.querySelector("a").href;

        if (currentURL === itemLink) {
            item.classList.add("active");
        } else {
            item.classList.remove("active");
        }
    });
});

$(document).ready(function () {
    // Function to apply the sidebar manipulation
    function manipulateSidebar() {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
        $(".sidebar .collapse").collapse("hide");
    }

    // Check if the window width is 600px or less
    if (window.matchMedia("(max-width: 768px)").matches) {
        manipulateSidebar();
    }

    // Listen for window resize events and reapply manipulation if necessary
    $(window).resize(function () {
        if (window.matchMedia("(max-width: 768px)").matches) {
            manipulateSidebar();
        } else {
            // If the width is larger than 600px, you might want to remove the modifications
            // For example: $("body").removeClass("sidebar-toggled");
            //              $(".sidebar").removeClass("toggled");
            //              $('.sidebar .collapse').collapse('show');
        }
    });
});

// for analytics //
$(document).ready(function () {
    $(".counter-value").each(function () {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text(),
                },
                {
                    duration: 3500,
                    easing: "swing",
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    },
                }
            );
    });
});

// JavaScript to toggle password visibility
$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

document.addEventListener("livewire-upload-finished", function () {
    var loader = document.getElementById("loader");
    loader.style.display = "none"; // Hide the loader when upload finished
});

document.addEventListener("livewire-upload-start", function () {
    var loader = document.getElementById("loader");
    loader.style.display = "block"; // Show the loader when upload starts
});

// Add a click event listener to the link
//document.getElementById("backButton").addEventListener("click", function (e) {
  //  e.preventDefault(); // Prevent the default link behavior

    // Use JavaScript to navigate back
 //   history.back();
//});

//color side bar

function toggleCollapse() {
    var aclSpan = document.getElementById('aclSpan');
    var aclIcon = document.querySelector('#aclIcon'); // Select the <i> element within aclSpan
    var aclCollapse = document.getElementById('ACLCollapse');

    aclSpan.classList.toggle('text-blue', !aclCollapse.classList.contains('show'));
    aclIcon.classList.toggle('text-blue', !aclCollapse.classList.contains('show'));
}

//modal file javascript
function customCloseFileModal() {
    $('#file').modal('hide');
}

function customCloseFilesModal() {
    $('#files').modal('hide');
}

function submitFileForm() {
    $.ajax({
        type: 'POST',
        url: $('#fileForm').attr('action'),
        data: $('#fileForm').serialize(),
        success: function (data) {
            localStorage.setItem('showFilesModal', 'true');
            location.reload();
        },
        error: function (error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    var showFilesModal = localStorage.getItem('showFilesModal');
    if (showFilesModal === 'true') {
        localStorage.removeItem('showFilesModal');
        $('#file').modal('show');
    }
});

//modal quiz javascript
function submitquizForm() {
    $.ajax({
       type: 'POST',
       url: $('#quizForm').attr('action'),
       data: $('#quizForm').serialize(),
       success: function (data) {
          localStorage.setItem('showQuizModal', 'true');
          location.reload();
       },
       error: function (error) {
          console.error(error);
       }
    });
 }

 $(document).ready(function() {
    var showFilesModal = localStorage.getItem('showQuizModal');
    if (showFilesModal === 'true') {
       localStorage.removeItem('showQuizModal');
       $('#quiz').modal('show');
    }
 });

 function customCloseAddQuizModal() {
    $('#quizes').modal('hide');
}
function customCloseQuizModal() {
    $('#quiz').modal('hide');
}
//modal question javascript
function customCloseAddQuestionsModal(quizId) {
    $('#question_' + quizId).modal('hide');
}
//modal docs javascript
function customCloseAddDocsModal() {
    $('#docs').modal('hide');
}
function customCloseDocModal() {
    $('#document').modal('hide');
}
function customCloseAddDocumentModal(documentId) {
    $('#docs_' + documentId).modal('hide');
}
function submitDocsForm() {
    $.ajax({
       type: 'POST',
       url: $('#DocsForm').attr('action'),
       data: $('#DocsForm').serialize(),
       success: function (data) {
          localStorage.setItem('showDocsModal', 'true');
          location.reload();
       },
       error: function (error) {
          console.error(error);
       }
    });
 }

 $(document).ready(function() {
    var showFilesModal = localStorage.getItem('showDocsModal');
    if (showFilesModal === 'true') {
       localStorage.removeItem('showDocsModal');
       $('#document').modal('show');
    }
 });

//modal feedback javascript
function customCloseAddFeedbackModal() {
    $('#addfeedback').modal('hide');
}

function customCloseFeedbackModal() {
    $('#feedback').modal('hide');
}

function customCloseShowFeedbackModal(feedback_Id) {
    $('#feedback_' + feedback_Id).modal('hide');
}

function submitFeedbackForm() {
    $.ajax({
       type: 'POST',
       url: $('#FeedbackForm').attr('action'),
       data: $('#FeedbackForm').serialize(),
       success: function (data) {
          localStorage.setItem('showFeedbackModal', 'true');
          location.reload();
       },
       error: function (error) {
          console.error(error);
       }
    });
 }

 $(document).ready(function() {
    var showFilesModal = localStorage.getItem('showFeedbackModal');
    if (showFilesModal === 'true') {
       localStorage.removeItem('showFeedbackModal');
       $('#feedback').modal('show');
    }
 });


 // Delete Modal.

 $(document).ready(function() {
    setTimeout(function() {
        $(".auto-close-alert").alert('close');
    }, 3000); // Close the alert after 1 second (1000 milliseconds)
});

  
