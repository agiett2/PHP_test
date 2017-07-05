<h1>PHP</h1>
<?php
$output = fopen('result.txt', 'w+');

//get data from json
$json = file_get_contents("test.json");
$jsonData = json_decode($json, true);

//get data from data.txt file
$text = file_get_contents("data.txt");
$textData = explode("\n", $text);

//sort the data by unit 
sort($textData);
array_multisort($jsonData);


foreach ($jsonData as $k => $data){
   //STDOUT to result.txt file
    fwrite($output, "#".$data['unit']." - ".$data['name']."\n");
}

foreach ($textData as $tdata){
    //STDOUT data to index.php
    echo $tdata."</br>";
}
?>

<h1>JavaScript</h1>
<html>
    <body>
        <script>
            var httpGet = (url)=> {
                let xmlHttp = new XMLHttpRequest();
                xmlHttp.open("Get", url, false);
                xmlHttp.send(null);
                return JSON.parse(xmlHttp.responseText);
            }
            
            //createds sorting function that gives you the allows you to specify the key to sort by
           var sorting = (array, sortBy) => {
                let  sortByKey = (a, b) => {
                    var x = a[sortBy];
                    var y = b[sortBy];
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                }
                array.sort(sortByKey);
            }
           var  myFunction  =  (item, index) => {
                document.write("#" + item.unit + " - " + item.name + "<br>");
            }
           
            var data = httpGet('test.json');
            //sorting by name
            sorting(this.data, 'unit');
            this.data.forEach(myFunction);
        </script>
    </body>
</html>
