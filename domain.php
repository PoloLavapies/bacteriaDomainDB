<html>
<head>
<link rel="stylesheet" type="text/css" href="common.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
<h1>Bacteria protein domain database</h1>
<h2>Search bacteria by protein domain</h2>
<h3>how to use</h3>
1. Please input protein domain name (a part is OK) and click "Search" button.<br>
2. Protein domains including the characters (input at 1.) are shown.<br>
3. If you click the link, bacteria having that protein domain are shown.<br><br>

<h3>Search Domains</h3>
<p id="text">please input protein domain name (a part is OK) and click "Search" button.</p>
<input id="name" name="name">
<button id="search">Search</button>
<table id="domains">
</table>
</body>
</html>

<script>
$("#search").on("click", function(){
    $.ajax({
        url: "./domainId.php",
        type: "POST",
        data: {
            'name': $("#name").val()
        }
    }).done((data) => {
        $("#text").html("please click the link to view bacteria including the protein domain.");
        $("#domains").html(data);
    });
});
</script>