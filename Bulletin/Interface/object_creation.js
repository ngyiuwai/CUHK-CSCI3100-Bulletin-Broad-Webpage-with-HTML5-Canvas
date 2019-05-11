//shape on canvas
//http://simonsarris.com/blog/140-canvas-moving-selectable-shapes
//mouse click
//http://www.html5canvastutorials.com/kineticjs/html5-canvas-path-mouseover/
//Box object to hold data for all drawn rects


function Box() {
  this.x = 0;
  this.y = 0;
  this.w = 1; // default width and height?
  this.h = 1;
  this.fill = '#444444';
}

// holds all our rectangles
var boxes = []; 

var canvas;

function init0() {

	var stage = new Kinetic.Stage({
	container: 'container',
	width: 1600,
	height: 600
  });
  
	init1(stage);
	init2(stage);
	
  	
}
  

function init1(stage) {
	var pictureURL;
	
	$(function() {
    //procedure for memo creation
    var urlObj = $( "#picURL" );
    //var contentObj = $( "#contentfield" );
    //var titleObj = $( "#title" );
 	
 	var allFields = $( [] ).add( title ).add( contentfield );
    var tips = $( ".validateTips" );
 	
    $( "#picture-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Create a picture": function() {
          
          //xpos = xposit.val();
          //ypos = yposit.val();
          pictureURL = urlObj.val();
          
          createPicture(pictureURL);
          
          $( this ).dialog( "close" );
          
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#create-picture" )
      .button()
      .click(function() {
        $( "#picture-form" ).dialog( "open" );
      });
  });

///
  canvas = document.getElementById('canvas');
  
  function createPicture(pictureURL) {
  
  	var imageObj = new Image();
  	imageObj.src = pictureURL;
  	
	//Pic Layer
	var picLayer = new Kinetic.Layer({
		x: 0,
		y: 0,
		draggable: true
	
	}); 
	
	var picImg = new Kinetic.Image({
          x: 0,
          y: 0,
          image: imageObj,
          name: 'image'
        });
	
    picLayer.add(picImg);
	stage.add(picLayer);
	//
	
	function writeMessage(messageLayer, message) {
        var context = messageLayer.getContext();
        messageLayer.clear();
        context.font = '18pt Calibri';
        context.fillStyle = 'black';
        context.fillText(message, 10, 25);
      }
	  
	   var messageLayer = new Kinetic.Layer();
	   
	    picLayer.on('mouseout', function() {
        writeMessage(messageLayer, 'Mouseout triangle');
      });

      picLayer.on('dblclick', function() {
		 //alert ("Hi");
		 var z=window.confirm("Are you sure you want to delete this picture?")
		 if (z)
		 picLayer.remove()
		 else
		 window.alert("Picture has been kept") 
        var mousePos = stage.getMousePosition();
        var x = mousePos.x - 190;
        var y = mousePos.y - 40;
        writeMessage(messageLayer, 'x: ' + x + ', y: ' + y);
      });

	
  }
    	
}





// initialize our canvas, add a ghost canvas, set draw loop
// then add everything we want to intially exist on the canvas
function init2(stage) {
  
  
  $(function() {
    //procedure for memo creation
    var titleObj = $( "#title" );
    var contentObj = $( "#contentfield" );
    //var titleObj = $( "#title" );
 	
 	var allFields = $( [] ).add( title ).add( contentfield );
    var tips = $( ".validateTips" );
 	
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Create a memo": function() {
          
          //xpos = xposit.val();
          //ypos = yposit.val();
          memotitle = titleObj.val();
          memocontent = contentObj.val();
          
          createMemo();
          
          $( this ).dialog( "close" );
          
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#create-meno" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });

///
  canvas = document.getElementById('canvas');
  
  function createObject(objX, objY) {
  
	//alert(xpos);
	//alert(ypos);
	//alert(memotitle);
	
	myLayer = new Kinetic.Layer();
	var myObject = new Kinetic.Rect({
  
		x: objX,
		y: objY,
		width: 60,
		height: 30,
		fill: "FFFF66",
		stroke: "#555",
		strokeWidth: 1
	
	});
	
	myLayer.add(myObject);
	stage.add(myLayer);
  }
  
  function createMemo() {
	
	//Memo Layer
	//Memo Layer
	var memoLayer = new Kinetic.Layer({
		x: 0,
		y: 0,
		width: 200,
		height: 200,
		draggable: true
	
	}); 
	
	var memoBlackground = new Kinetic.Rect({
	
		x: 0,
		y: 0,
		width: 200,
		height: 200,
		fill: "FFFF66",
		stroke: "#555",
		strokeWidth: 1
	
	});
	
	var memoTitle = new Kinetic.Text({
		x: 0,
		y: 0,
		text: memotitle,
		fontSize: 18,
		fontFamily: 'Calibri',
		fontStyle: 'bold',
		fill: 'black',
		width: 200,
		padding: 15,
		align: 'center'
	});
	
	var memoContent = new Kinetic.Text({
		x: 0,
		y: 0,
		text: '\n'+memocontent,
		fontSize: 18,
		fontFamily: 'Calibri',
		fill: 'black',
		width: 200,
		padding: 20,
		align: 'left'
	});
	
	memoLayer.add(memoBlackground);
	memoLayer.add(memoTitle);
	memoLayer.add(memoContent);
	stage.add(memoLayer);
	//
	
	function writeMessage(messageLayer, message) {
        var context = messageLayer.getContext();
        messageLayer.clear();
        context.font = '18pt Calibri';
        context.fillStyle = 'black';
        context.fillText(message, 10, 25);
      }
	  
	   var messageLayer = new Kinetic.Layer();
	   
	    memoLayer.on('mouseout', function() {
        writeMessage(messageLayer, 'Mouseout triangle');
      });

      memoLayer.on('dblclick', function() {
		 //alert ("Hi");
		 var z=window.confirm("Are you sure you want to delete this memo?")
		 if (z)
		 memoLayer.remove()
		 else
		 window.alert("Memo has been kept") 
        var mousePos = stage.getMousePosition();
        var x = mousePos.x - 190;
        var y = mousePos.y - 40;
        writeMessage(messageLayer, 'x: ' + x + ', y: ' + y);
      });
	
  }
      
//   var stage = new Kinetic.Stage({
// 	container: 'container',
// 	width: 1600,
// 	height: 600
//   });
//   
  var memotitle;
  var memocontent;
  
  ///
  

}

// While draw is called as often as the INTERVAL variable demands,
// It only ever does something if the canvas gets invalidated by our code
function draw() {
	
	alert("hi");
    alert(xpos);
    alert(ypos);
    
    // draw all boxes
    var l = boxes.length;
    for (var i = 0; i < l; i++) {
        drawshape(ctx, boxes[i], boxes[i].fill);
    }
}



