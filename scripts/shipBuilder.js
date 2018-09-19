// JavaScript source code

//Script for Controling Tabs
var incMargin = 1;
$("document").ready(function () {
    //$("#tabsCtrl").tabs();
    $("#tabsCtrl").tabs({
        heightStyle: "fill",
        collapsible: true
    });
    $("#tabsCtrl").tabs().css({
        'min-height': '400px',
        'overflow': 'auto'
    });
});
//Script for adding rows to Parts list
var newRow = function () {
    //adds a new row to the parts table.
    $('#myTable tr:last').after(
        '<tr><td class="tool2"><input type="text" class="tool2 tool2TableInput" ></td>' +
        '<td class="tool2"><input type="text" class="tool2 tool2Number tool2TableInput spentBP"></td>' +
        '<td class="tool2"><input type="text" class="tool2 tool2Number tool2TableInput spentCP"></td></tr>'
    );
    $("main").css("padding-botom", "incMargin");
    incMargin++;
};


//spent BP must be a global var
var spentBP = 0;
var powerCoreName = "";
var powerCoreOutput = 0;
var pcBpCost = 0;

var class$ = function (className) {
    return document.getElementsByClassName(className);
};


function powerCoreAssigner() {
    //uses a selector with values from 1 - 22 to select a power core
    //then assings values for the cost and prodution of said core
    var selectedPC = document.getElementById("powerCore_Select");
    switch (parseInt(selectedPC.value)) {
        case 1:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 50;
            pcBpCost = 4;
            break;
        case 2:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 70;
            pcBpCost = 6;
            break;
        case 3:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 80;
            pcBpCost = 8;
            break;
        case 4:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 75;
            pcBpCost = 7;
            break;
        case 5:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 90;
            pcBpCost = 9;
            break;
        case 6:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 120;
            pcBpCost = 12;
            break;
        case 7:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 140;
            pcBpCost = 14;
        case 8:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 100;
            pcBpCost = 10;
            break;
        case 9:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 130;
            pcBpCost = 13;
            break;
        case 10:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 150;
            pcBpCost = 15;
            break;
        case 11:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 175;
            pcBpCost = 17;
            break;
        case 12:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 200;
            pcBpCost = 20;
            break;
        case 13:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 150;
            pcBpCost = 15;
            break;
        case 14:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 200;
            pcBpCost = 20;
            break;
        case 15:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 250;
            pcBpCost = 25;
            break;
        case 16:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 300;
            pcBpCost = 30;
            break;
        case 17:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 150;
            pcBpCost = 15;
            break;
        case 18:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 200;
            pcBpCost = 20;
            break;
        case 19:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 300;
            pcBpCost = 30;
            break;
        case 20:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 300;
            pcBpCost = 30;
            break;
        case 21:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 400;
            pcBpCost = 40;
            break;
        case 22:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 500;
            pcBpCost = 50;
            break;
        default:
            powerCoreName = selectedPC.textContent;
            powerCoreOutput = 0;
            pcBpCost = 0;
    }
}

function CalcBpFromList() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".spentBP").each(function () {
        //add only if the value is number

        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseInt(this.value);
        } else {
            sum += 0;
        }

    });
    //.toFixed() method will roundoff the final sum to 0 decimal places
    return sum.toFixed(0);
}


function CalcPcFromList() {
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".spentCP").each(function () {
        //add only if the value is number

        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseInt(this.value);
        } else {
            sum += 0;
        }

    });
    //.toFixed() method will roundoff the final sum to 0 decimal places
    return sum.toFixed(0);
}

function calcBP() {
    console.log("executed calcBP");
    var shipTier = document.getElementById("tier").value;
    var bpDisplay = "";
    var shipBP = 0;
    var errorSpan = document.getElementById("bpDisplay");
    spentBP = document.getElementById("spentPoints").value;

    //calculates Ship data from Tier
	//also contains validation at the end
    if (shipTier == "1/4") {
        shipBP = 25;
    } else if (shipTier == "1/3") {
        shipBP = 30;
    } else if (shipTier == "1/2") {
        shipBP = 40;
    } else if (shipTier == "1") {
        shipBP = 55;
    } else if (shipTier == "2") {
        shipBP = 75;
    } else if (shipTier == "3") {
        shipBP = 95;
    } else if (shipTier == "4") {
        shipBP = 115;
        hpIncrease = 1;
    } else if (shipTier == "5") {
        shipBP = 135;
        hpIncrease = 1;
    } else if (shipTier == "6") {
        shipBP = 155;
        hpIncrease = 1;
    } else if (shipTier == "7") {
        shipBP = 180;
        hpIncrease = 1;
    } else if (shipTier == "8") {
        shipBP = 205;
        hpIncrease = 2;
    } else if (shipTier == "9") {
        shipBP = 230;
        hpIncrease = 2;
    } else if (shipTier == "10") {
        shipBP = 270;
        hpIncrease = 2;
    } else if (shipTier == "11") {
        shipBP = 310;
        hpIncrease = 2;
    } else if (shipTier == "12") {
        shipBP = 350;
        hpIncrease = 3;
    } else if (shipTier == "13") {
        shipBP = 400;
        hpIncrease = 3;
    } else if (shipTier == "14") {
        shipBP = 450;
        hpIncrease = 3;
    } else if (shipTier == "15") {
        shipBP = 500;
        hpIncrease = 3;
    } else if (shipTier == "16") {
        shipBP = 600;
        hpIncrease = 4;
    } else if (shipTier == "17") {
        shipBP = 700;
        hpIncrease = 4;
    } else if (shipTier == "18") {
        shipBP = 800;
        hpIncrease = 4;
    } else if (shipTier == "19") {
        shipBP = 900;
        hpIncrease = 4;
    } else if (shipTier == "20") {
        shipBP = 1000;
        hpIncrease = 5;
    } else if (shipTier == "") {
        bpDisplay = "Ship Tier Cannot be blank";
        shipBP = 1;
        hpIncrease = 0;
        spentBP = 0;
    } else if (isNaN(shipTier)) {
        bpDisplay = "Ship Tier Must be 1-20, 1/4, 1/3 or 1/2";
        shipBP = 1;
        hpIncrease = 0;
        spentBP = 0;
    } else {
        bpDisplay = "Invalid Input";
        shipBP = 1;
        hpIncrease = 0;
        spentBP = 0;
    }
    //clear bpDisplay
    if (!(shipBP == 1 && spentBP == 0)) {
        bpDisplay = "";
    }
    //incase spent BP is invalid -> reset
    if (isNaN(spentBP) || spentBP === undefined || spentBP == "") {
        spentBP = 0;
    }

    //update bpDisplay error <span>
    errorSpan.textContent = bpDisplay;
    console.log("completed calcBP");
    return shipBP;
}
function shipUpdate() {
	//Function runs when the update button is pressed
	//it is used to calcuate the amount of build points spent
	//as well as to adjust the progress bar indicator
    powerCoreAssigner();
    var elem = document.getElementById("buildPointBar");//build point number
    var elem2 = document.getElementById("powerPointBar");//PC number
    var width = 10;
    var maxBPNum = 10;
    var hpIncrease = 0;//not implemented yet
    updateBar();
    function updateBar() {
        width = calcBP();
        var spentBPNum = (parseInt(spentBP) + parseInt(CalcBpFromList()) + pcBpCost);
        var spentPCNum = (parseInt(CalcPcFromList()))
		//calcuates the percentage of points spent and 
		//adjusts the progress bar accordingly
        elem.style.width = ((width - spentBPNum) / width * 100) + '%';
        elem.innerHTML = width - spentBPNum;
        elem2.innerHTML = powerCoreOutput - spentPCNum;
        elem2.style.width = ((powerCoreOutput - spentPCNum) / powerCoreOutput * 100) + '%';
        spentBP.textContent = "-" + spentBPNum;
    }
}