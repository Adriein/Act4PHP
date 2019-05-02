$(document).ready(function(){
  $("#myInput").on("keyup", function(){
    let search = $(this).val().toLowerCase();

    $("#myTable tr:not(:first-child)").filter(function() {
      console.log(this);
      $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1)
    });

  });
//filter((a,b) => b.toogle(b.text().toLowerCase().indexOf(search) > -1))
});
