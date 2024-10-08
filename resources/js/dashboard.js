document.addEventListener('DOMContentLoaded', function() {
    const errorList = document.getElementById('error-list');

    setTimeout(() => {
        errorList.classList.add('show');
    }, 100);

    setTimeout(() => {
        errorList.classList.remove('show');
    }, 10000);

    // Hide the error list when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!errorList.contains(event.target)) {
            errorList.classList.remove('show');
        }
    });

    const successList = document.getElementById('success-list');
    
    setTimeout(() => {
        successList.classList.add('show');
    }, 100);
    
    setTimeout(() => {
        successList.classList.remove('show');
    }, 10000);
    
    // Hide the success list when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!successList.contains(event.target)) {
            successList.classList.remove('show');
        }
    });
});

function handleResize() {
    if ($(window).width() <= 1024) {
        $('.main-content').addClass('main-content_sidebar-hide');
        $('.sidebar').addClass('active');
    } else {
        $('.main-content').removeClass('main-content_sidebar-hide');
        $('.sidebar').removeClass('active');
    }
    if ($(window).width() <= 768) {
        $('.main-content').removeClass('main-content_sidebar-hide');
        $('.sidebar').removeClass('active');
    }
}

// Initial check
handleResize();

// Check on window resize
$(window).resize(handleResize);

$('#openOverlay').click(function() {
    $(window).scrollTop(0);
    $('#overlay').css('display', 'flex');
    $('body').css('overflow', 'hidden');
});

$('#openOverlay2').click(function() {
    $(window).scrollTop(0);
    $('#overlay2').css('display', 'flex');
    $('body').css('overflow', 'hidden');
    alert('et')
});

$('#closeOverlay').click(function() {
    $('#overlay').css('display', 'none');
    $('body').css('overflow', 'auto');
});

$('#overlay').click(function(e) {
    var overlayContainer = $('.overlay-container');
    if (!overlayContainer.is(e.target) && overlayContainer.has(e.target).length === 0) {
        $('#overlay').css('display', 'none');
        $('body').css('overflow', 'auto');
    }
});

// Prevent overlay from closing when clicking inside overlay-content
$('.overlay-container').click(function(e) {
    e.stopPropagation();
});


$(document).ready(function() {
    const rows = $('table tbody tr');
    const entriesDropdown = $('#entries');
    const searchInput = $('#search');
    const prevButton = $('.prev');
    const nextButton = $('.next');
    const pageNumbersDiv = $('.page-numbers');

    let currentPage = 1;
    let rowsPerPage = parseInt(entriesDropdown.val());

    function updateTable() {
        const searchTerm = searchInput.val().toLowerCase();
        const filteredRows = rows.filter(function() {
            const text = $(this).text().toLowerCase();
            return text.includes(searchTerm);
        });

        const totalRows = filteredRows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        // Update pagination visibility
        prevButton.prop('disabled', currentPage === 1);
        nextButton.prop('disabled', currentPage === totalPages);

        // Hide all rows and show only the current page's rows
        rows.hide();
        filteredRows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage).show();

        // Update page numbers
        updatePagination(totalPages);
    }

    function updatePagination(totalPages) {
        pageNumbersDiv.empty();

        for (let i = 1; i <= totalPages; i++) {
            const pageNumber = $('<span class="page-number"></span>').text(i);

            if (i === currentPage) {
                pageNumber.addClass('current');
            }

            pageNumber.on('click', function() {
                currentPage = i;
                updateTable();
            });

            pageNumbersDiv.append(pageNumber);
        }
    }

    entriesDropdown.on('change', function() {
        rowsPerPage = parseInt($(this).val());
        currentPage = 1;
        updateTable();
    });

    searchInput.on('keyup', function() {
        currentPage = 1;
        updateTable();
    });

    prevButton.on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            updateTable();
        }
    });

    nextButton.on('click', function() {
        const searchTerm = searchInput.val().toLowerCase();
        const filteredRows = rows.filter(function() {
            const text = $(this).text().toLowerCase();
            return text.includes(searchTerm);
        });
        const totalRows = filteredRows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        if (currentPage < totalPages) {
            currentPage++;
            updateTable();
        }
    });

    // Initialize table
    updateTable();
});
