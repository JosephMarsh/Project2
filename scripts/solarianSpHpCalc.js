// JavaScript source code by Joseph Marsh
var id$ = function (id) {
    return document.getElementById(id);
};
var class$ = function (className) {
    return document.getElementsByClassName(className)
};

var calculateSp = function (level, conMod, classMod) {
    var sp = parseInt((classMod + conMod) * level);
    return sp;
};
var calculateHp = function (raceHp, level, classMod) {
    var hp = parseInt(classMod + raceHp);
	if (level > 1){
		level--;
		hp += parseInt((classMod * level) + raceHp);
	};
    return hp;
};



var processEntries = function () {
    var classMod = parseInt(id$("class_select").value);
    var level = parseInt(id$("level").value);
    var conMod = parseInt(id$("conMod").value);
    var raceHp = parseInt(id$("raceHp").value);
    var errorMesage = "";

    id$("error-tab1").textContent = "";
    //validation block
    if (isNaN(level)) {
        errorMesage="level entries must be numeric";
        id$("level").focus();
        
    } else if (level <= 0 || level > 20) {
        errorMesage = "level entered must be between 1 and 20";
        id$("level").focus();
    } else if (isNaN(conMod)) {
        errorMesage = "Con Mod entery must be numeric";
        id$("conMod").focus();
    } else if (conMod < -2 || conMod > 5) {
        errorMesage = "Con Mod entered must be between -2 and 5";
        id$("conMod").focus();
    } else if (raceHp < 2 || raceHp > 7) {
        errorMesage = "Race HP must be between 2 and 7";
        id$("raceHp").focus();
    } else if (isNaN(raceHp)) {
        errorMesage = "Race HP must be a number";
        id$("raceHp").focus();
    } else {
        //if all seems good run the calcuation functions
        id$("sp").value = calculateSp(level, conMod, classMod);
        id$("hp").value = calculateHp(raceHp, level, classMod);
        errorMesage = "";
    }
    id$("error-tab1").textContent = errorMesage;
};
window.onload = function () {
    id$("calculate").onclick = processEntries;
    id$("level").focus();
    id$("clear").onclick = clearEntries;
};
//clears entries and resets focus

var clearEntries = function () {
    //clear all values
    id$("level").value = "";
    id$("conMod").value = "";
    id$("sp").value = "";
    id$("raceHp").value = "";
    id$("hp").value = "";
    //reset focus
    id$("level").focus();
};

