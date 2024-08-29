import "./frontend.scss";

// Wait for the window to load
window.addEventListener( "load", () => {
    // The code output
    const dataEl = document.querySelector( ".data pre" ).innerHTML;
    const dataJSON = JSON.parse( dataEl );
    // Notes for testing
    console.log( "Data from the front end", dataJSON );
    //console.log(Object.keys(dataJSON)[3]);
    
    //console.log(dataJSON.results[0].title);     
    //console.log(dataJSON["results"][0]["title"]);
    
    // All the books
    let books = dataJSON.results;

    console.log(books)

    // Book Titles
    document.getElementById("title-text-0").innerHTML = dataJSON["results"][0]["title"];
    document.getElementById("title-text-1").innerHTML = dataJSON["results"][1]["title"];
    document.getElementById("title-text-2").innerHTML = dataJSON["results"][2]["title"];
    document.getElementById("title-text-3").innerHTML = dataJSON["results"][4]["title"];

    // Book Authors
    document.getElementById("author-text-0").innerHTML = dataJSON["results"][0]["author"];
    document.getElementById("author-text-1").innerHTML = dataJSON["results"][1]["author"];
    document.getElementById("author-text-2").innerHTML = dataJSON["results"][2]["author"];
    document.getElementById("author-text-3").innerHTML = dataJSON["results"][4]["author"];

    // Book Descriptions
    document.getElementById("description-text-0").innerHTML = dataJSON["results"][0]["description"];
    document.getElementById("description-text-1").innerHTML = dataJSON["results"][1]["description"];
    document.getElementById("description-text-2").innerHTML = dataJSON["results"][2]["description"];
    document.getElementById("description-text-3").innerHTML = dataJSON["results"][4]["description"];
   

  });


