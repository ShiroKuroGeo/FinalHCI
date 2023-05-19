//Documentation Ready forJquery
$(document).ready(function() {
    searchTable();
    searchUl();
    chartForEmployee();
    seeMore();
});

/**/
//Search from the table
function searchTable(){
    $('#searchFromTable').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#myTable tr:not(:first)').each(function() {
          var cellText = $(this).find('td').eq(1).text().toLowerCase();
          $(this).toggle(cellText.indexOf(value) > -1);
        });
      });
}

function searchUl(){
    $('#searchInput').on('input', function() {
        const query = $(this).val().toLowerCase();
    
        $('#myList li').each(function() {
          const listItemText = $(this).text().toLowerCase();
          $(this).toggle(listItemText.includes(query));
        });
    });
}

/**/
//Chart of Employee
function chartForEmployee(){
    $('.chart').each(function() {
        var $this = $(this);
        $this.circleProgress({
          value: $this.data('percent') / 100,
          size: 150,
          fill: {
            gradient: ['#5cb85c', '#5cb85c']
          }
        });
    });
}

/**/
//This if for see more text
function seeMore(){
  $('.more-btn').click(function() {
    $('.text').addClass('show-content');
    $('.read-more-back').removeClass('read-more');
  });
}