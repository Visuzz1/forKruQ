document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    const table = document.getElementById('recommendTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const paginationContainer = document.getElementById('page-numbers');
    let currentPage = 1;

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('div');
            pageButton.textContent = i;
            pageButton.className = 'page-number';
            pageButton.dataset.page = i;

            if (i === currentPage) {
                pageButton.classList.add('active');
            }

            paginationContainer.appendChild(pageButton);
        }
    }

    function goToPage(page) {
        currentPage = page;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        displayRows(startIndex, endIndex);
        updatePagination();
    }

    paginationContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('page-number')) {
            goToPage(Number(event.target.dataset.page));
        }
    });

    document.getElementById('first-page').addEventListener('click', function() {
        goToPage(1);
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) goToPage(currentPage - 1);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) goToPage(currentPage + 1);
    });

    document.getElementById('last-page').addEventListener('click', function() {
        goToPage(totalPages);
    });

    goToPage(1);
});
// viral
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    const table = document.getElementById('viralTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const paginationContainer = document.getElementById('page-numbers');
    let currentPage = 1;

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('div');
            pageButton.textContent = i;
            pageButton.className = 'page-number';
            pageButton.dataset.page = i;

            if (i === currentPage) {
                pageButton.classList.add('active');
            }

            paginationContainer.appendChild(pageButton);
        }
    }

    function goToPage(page) {
        currentPage = page;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        displayRows(startIndex, endIndex);
        updatePagination();
    }

    paginationContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('page-number')) {
            goToPage(Number(event.target.dataset.page));
        }
    });

    document.getElementById('first-page').addEventListener('click', function() {
        goToPage(1);
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) goToPage(currentPage - 1);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) goToPage(currentPage + 1);
    });

    document.getElementById('last-page').addEventListener('click', function() {
        goToPage(totalPages);
    });

    goToPage(1);
});
// food
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    const table = document.getElementById('foodTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const paginationContainer = document.getElementById('page-numbers');
    let currentPage = 1;

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('div');
            pageButton.textContent = i;
            pageButton.className = 'page-number';
            pageButton.dataset.page = i;

            if (i === currentPage) {
                pageButton.classList.add('active');
            }

            paginationContainer.appendChild(pageButton);
        }
    }

    function goToPage(page) {
        currentPage = page;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        displayRows(startIndex, endIndex);
        updatePagination();
    }

    paginationContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('page-number')) {
            goToPage(Number(event.target.dataset.page));
        }
    });

    document.getElementById('first-page').addEventListener('click', function() {
        goToPage(1);
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) goToPage(currentPage - 1);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) goToPage(currentPage + 1);
    });

    document.getElementById('last-page').addEventListener('click', function() {
        goToPage(totalPages);
    });

    goToPage(1);
});
// drinks
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    const table = document.getElementById('drinksTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const paginationContainer = document.getElementById('page-numbers');
    let currentPage = 1;

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('div');
            pageButton.textContent = i;
            pageButton.className = 'page-number';
            pageButton.dataset.page = i;

            if (i === currentPage) {
                pageButton.classList.add('active');
            }

            paginationContainer.appendChild(pageButton);
        }
    }

    function goToPage(page) {
        currentPage = page;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        displayRows(startIndex, endIndex);
        updatePagination();
    }

    paginationContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('page-number')) {
            goToPage(Number(event.target.dataset.page));
        }
    });

    document.getElementById('first-page').addEventListener('click', function() {
        goToPage(1);
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) goToPage(currentPage - 1);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) goToPage(currentPage + 1);
    });

    document.getElementById('last-page').addEventListener('click', function() {
        goToPage(totalPages);
    });

    goToPage(1);
});
// news
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    const table = document.getElementById('newsTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const paginationContainer = document.getElementById('page-numbers');
    let currentPage = 1;

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('div');
            pageButton.textContent = i;
            pageButton.className = 'page-number';
            pageButton.dataset.page = i;

            if (i === currentPage) {
                pageButton.classList.add('active');
            }

            paginationContainer.appendChild(pageButton);
        }
    }

    function goToPage(page) {
        currentPage = page;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        displayRows(startIndex, endIndex);
        updatePagination();
    }

    paginationContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('page-number')) {
            goToPage(Number(event.target.dataset.page));
        }
    });

    document.getElementById('first-page').addEventListener('click', function() {
        goToPage(1);
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) goToPage(currentPage - 1);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) goToPage(currentPage + 1);
    });

    document.getElementById('last-page').addEventListener('click', function() {
        goToPage(totalPages);
    });

    goToPage(1);
});
// topic
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5;
    const table = document.getElementById('topicTable');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const paginationContainer = document.getElementById('page-numbers');
    let currentPage = 1;

    function displayRows(startIndex, endIndex) {
        rows.forEach((row, index) => {
            row.style.display = (index >= startIndex && index < endIndex) ? '' : 'none';
        });
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('div');
            pageButton.textContent = i;
            pageButton.className = 'page-number';
            pageButton.dataset.page = i;

            if (i === currentPage) {
                pageButton.classList.add('active');
            }

            paginationContainer.appendChild(pageButton);
        }
    }

    function goToPage(page) {
        currentPage = page;
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;
        displayRows(startIndex, endIndex);
        updatePagination();
    }

    paginationContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('page-number')) {
            goToPage(Number(event.target.dataset.page));
        }
    });

    document.getElementById('first-page').addEventListener('click', function() {
        goToPage(1);
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) goToPage(currentPage - 1);
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) goToPage(currentPage + 1);
    });

    document.getElementById('last-page').addEventListener('click', function() {
        goToPage(totalPages);
    });

    goToPage(1);
});


