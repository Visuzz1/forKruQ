// recommend    
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const recommend = document.querySelectorAll('#recommendTable tbody tr');
    
  

    recommend.forEach(recommend => {
        const name = recommend.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const location = recommend.querySelector('td:nth-child(4)').textContent.toLowerCase();
        
        if (name.includes(searchValue) || location.includes(searchValue)) {
            recommend.style.display = '';
        } else {
            recommend.style.display = 'none';
        }
    });
});
// viral
document.getElementById('searchviral').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const viral = document.querySelectorAll('#viralTable tbody tr');
    
  

    viral.forEach(viral => {
        const name = viral.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const location = viral.querySelector('td:nth-child(4)').textContent.toLowerCase();
        
        if (name.includes(searchValue) || location.includes(searchValue)) {
            viral.style.display = '';
        } else {
            viral.style.display = 'none';
        }
    });
});
// food
document.getElementById('searchfood').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const food = document.querySelectorAll('#foodTable tbody tr');
    
  

    food.forEach(food => {
        const name = food.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const location = food.querySelector('td:nth-child(4)').textContent.toLowerCase();
        
        if (name.includes(searchValue) || location.includes(searchValue)) {
            food.style.display = '';
        } else {
            food.style.display = 'none';
        }
    });
});
// drinks
document.getElementById('searchdrinks').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const drinks = document.querySelectorAll('#drinksTable tbody tr');
    
  

    drinks.forEach(drinks => {
        const name = drinks.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const location = drinks.querySelector('td:nth-child(4)').textContent.toLowerCase();
        
        if (name.includes(searchValue) || location.includes(searchValue)) {
            drinks.style.display = '';
        } else {
            drinks.style.display = 'none';
        }
    });
});
// news
document.getElementById('searchnews').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const news = document.querySelectorAll('#newsTable tbody tr');
    
  

    news.forEach(news => {
        const name = news.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const location = news.querySelector('td:nth-child(4)').textContent.toLowerCase();
        
        if (name.includes(searchValue) || location.includes(searchValue)) {
            news.style.display = '';
        } else {
            news.style.display = 'none';
        }
    });
});
// topic
document.getElementById("searchtopic").addEventListener("keyup", function() {
    let input = document.getElementById("searchtopic");
    let filter = input.value.toLowerCase();
    let table = document.getElementById("topicTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                if (td[j].innerText.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }

        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
});
// member
document.getElementById("searchmember").addEventListener("keyup", function() {
    let input = document.getElementById("searchmember");
    let filter = input.value.toLowerCase();
    let table = document.getElementById("memberTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                if (td[j].innerText.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }

        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
});
// view
document.getElementById("searchview").addEventListener("keyup", function() {
    let input = document.getElementById("searchview");
    let filter = input.value.toLowerCase();
    let table = document.getElementById("viewTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                if (td[j].innerText.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }

        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
});



