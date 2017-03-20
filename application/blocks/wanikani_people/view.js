
$(document).ready(function(){

size();

/* Search Stuff */

$('.submit-search-button').click(function(){
  //Get VARIABLES
  var suburb_or_town = $('.form-search-suburb').val();
  var property_category = $('.form-search-type').val();
  var min_price = $('.form-search-min-price').val();
  var max_price = $('.form-search-max-price').val();
  var property_id = $('.form-search-property-id-input').val();
  if (property_id == ""){
    property_id = "undefined";
  }

   window.location.href = window.location.pathname + "?suburb_or_town=" + suburb_or_town + "&property_category=" + property_category + "&min_price=" + min_price + "&max_price=" + max_price +"&property_id=" + property_id;

});

/* Search Styles */


//




/* Grid stuff */
$('.grid-item').click(function(){
  $id = $(this).attr('id');
  $id = '#' + $id + '';
  console.log($id);
  detailClick($id);
});

$('.fixed-close-button').click(function(){
  $id = $(this).attr('id');
  $id = '#' + $id + '';
  console.log($id);
  removeDetailClick($id);
});


  function detailClick (property_id){
    if ($(property_id + '.grid-item').hasClass('open')){
      $(property_id + '.grid-item').removeClass('open');
    }else {
      $(property_id + '.grid-item').addClass('open');
    }
  }

  function removeDetailClick (property_id){
    $(property_id + '.fixed-large-property-box-background').css("display", "none");
  }


//Added Grid system

// version 1.2
// changed to use container width rather than viewport so that it displays correctly on larger screens
//
//-------------------

//Jquery
	// Setup Variables used for knowing the width of the view port and calculating the width of the blocks
//	$('.grid-loader').text('Go!');
//	$('.grid-loader').fadeOut();
//	$('.grid-container').fadeIn();

  function size() {
	// Viewport width
	var container = $('.grid-container').width();

	// Breakpoints
	var breakpointSmall = 640 - 58;
	var breakpointMedium = 800;
	var breakpointLarge = 1000;
	var breakpointXLarge = 1200;
	var breakpointXXLarge = 1600;
	var breakpointXXXLarge = 1900;
	var currentBreakPoint = "Small";
	var oldBreakPoint = "blah";

	//Default Block Sizes
	var blockSizeG1 = 200;
	var blockSizeG2 = 400;
	var blockHeight = 300;
	var blockHeightQ = 600;

	// Default
	var blocksPerRow = 5;

	//Important Ordering arrays
	var eOrder = new Array();
	var sizePE = new Array();

	//Startup functions (get blocks per row)
	blocksPerRowC(container);
	// Set the old breakpoint using the current one to beging with
	oldBreakPoint = currentBreakPoint;
	// Calculate the box sizing
	calcBlockSize(container);
	// Set the background size to go along with it
	setBackgroundSize();
	// Resize the actual elements
	resize();
	// Index all the elements // Important for ordering
//	index();
	// INTRODUCING THE ARRANGE FUNCTION
	arrange();
	// Work out how many blocks per row depending on screen size
	$( window ).resize(function() {
		// Viewport Width
		container = $('.grid-container').width();
		// Get blocks per row
		blocksPerRowC(container);
		// Calculate block sizing dependign on the viewport size
		calcBlockSize(container);
		// Set background size along with it
		setBackgroundSize();
		// Resize the actual elements
		resize();
		// INTRODUCING THE ARRANGE FUNCTION
		// If a breakpoint has been reached
		if (currentBreakPoint != oldBreakPoint){
			// Run this Function
			breakPointChange();
			// Reset the old Breakpoint as the current one because now it is current
			oldBreakPoint = currentBreakPoint;
		}
	});


	//Set the placeholders
	function setBackgroundSize(){
		// Manipulate the background size Is only 4.2 for scaling issue on chrome
		$('div.ccm-block-page-list-thumbnail-grid-wrapper').css("background-size", (blockSizeG1 + 10.2) + 'px ' + (blockHeight + 10.2) + 'px');
	};

	//Figure out how many block are meant per row
	function blocksPerRowC(vp){
		if (vp <= breakpointSmall){
			blocksPerRow = 1;
			currentBreakPoint = "Small";
		} else if (vp <= breakpointMedium && vp > breakpointSmall){
			blocksPerRow = 1;
			currentBreakPoint = "Medium";
		}	else if (vp <= breakpointLarge && vp > breakpointMedium){
			blocksPerRow = 2;
			currentBreakPoint = "Large";
		} else if (vp <= breakpointXLarge && vp > breakpointLarge){
			blocksPerRow = 2;
			currentBreakPoint = "XLarge";
		} else if (vp <= breakpointXXLarge && vp > breakpointXLarge){
			blocksPerRow = 3;
			currentBreakPoint = "XXLarge";
		} else if (vp <= breakpointXXXLarge && vp > breakpointXXLarge){
			blocksPerRow = 4;
			currentBreakPoint = "XXXLarge";
		} else if (vp > breakpointXXXLarge){
			blocksPerRow = 5;
			currentBreakPoint = "XXXXLarge";
		}
		console.log(currentBreakPoint);
	}

	// On break point change
	function breakPointChange () {
			// Reset The Layout
		//	reset();
			// Arrange the Layout again
		//	arrange();
	}

	//Calculate Block Sizes
	function calcBlockSize(vp){
		//Size of all grid elements without border and padding
		var gridSize = (vp - (20*blocksPerRow));
		//Single Block Size
		blockSizeG1 = gridSize / blocksPerRow;
		//Double Block Size
		blockSizeG2 = (blockSizeG1 * 2) + 4;

		//Heights * 1.3333 3:4 aspect ratio

		//blockHeight = (blockSizeG1 * 0.6);
    blockHeight = 150;
		blockHeightQ = (blockSizeG2 * 1.33333) - 2;
	}

	function resize() {
		//Element interaction is here
		$('.grid-item').css("width", blockSizeG1);
		$('.grid-item').css("height", blockHeight);
	};

	// Important indexing of grid for sorting
	function index (){
		// For each dom with the class ""
		$('div.ccm-block-page-list-page-entry-grid-item').each(function(index, element){
			var size = 0;
			// Set Sizes
			if ($(element).hasClass("Single")){ size = 1 };
			if ($(element).hasClass("Double")){ size = 2 };
			if ($(element).hasClass("Quad")){ size = 2 };
			// Store element
			eOrder.push(element);
			// Store Sizes
			sizePE.push(size);
		//	console.log(index);
		});
	};
	// The arrange function
	function arrange (){
	//	console.log("aranging")
		var divRate  = blocksPerRow;
		// A column counter
		var column = 0;
		// A row counter
		var rowCount = 0;
		// Global variable to be use to determin if the next block is to be moved back to an empty spot
		var toShiftBack;
		// For each item in eOrder (declared above)
		$(eOrder).each(function(index, element){
			//Find elements size
			var size = sizePE[index];
			// Add to the column
			column += size;

			// If size is only 1 column wide
			if (size == 1){
				if (toShiftBack){
					$(element).insertBefore(eOrder[index-1]);
				//	console.log("element shifted behind " + (index - 1));
					rowCount += 1;
				//	console.log("Passed row " + rowCount);
					toShiftBack = false;
				}
			}
				if ($(element).hasClass("Quad")){
						if (rowCount == 0){
						//	console.log("Quad to be insterted first in first row");
							$(element).insertBefore(eOrder[0]);
						//	console.log("Quad moved behind" + 0);
						}else{
							var place = ((rowCount * divRate) - 1);
						//	console.log("Quad to be insterted first in other row place: " + place);
							$(element).insertBefore(eOrder[place]);
						}
				}

			if (column == divRate){
				rowCount += 1;
			//	console.log("Passed Row " + rowCount);
				column = 0;
			} else if (column == divRate + 1) {
				toShiftBack = true;
			//	console.log("ready to shift element back")
				column -= divRate - 1;
			}
			lastElement = eOrder[index];
		//	console.log(column);
		});
	}

	// Finally the reset function
	function reset() {
	//	console.log('reseting');
		// Simply goes through each item in eOrder which we indexed before and places the elements in order as they were before arranging effectivly reseting it.
		$(eOrder).each(function(index, element){
		$(eOrder[index + 1]).insertAfter(element);
		});
	}

}

});
