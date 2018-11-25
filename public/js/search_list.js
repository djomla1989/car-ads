var models = new Array();
var models_ids = new Array();
            models[1] =["MDX", "RDX", "RL", "TL", "TSX "]; 
            models[2] =[];["DB9"]; 
            models[3] =["A3", "A4", "A5", "A6", "A8", "Q7", "R8", "RS 4", "S4", "S5", "S6", "S8", "TT "];
            models[4] =["128", "135", "328", "335", "528", "535", "550", "650", "750", "760", "Alpina B7", "M3", "M5", "M6", "X3", "X5", "X6", "Z4", "Z4 M "];
           models[5] = ["Enclave", "LaCrosse", "Lucerne"];
           models[6] =["CTS", "DTS", "Escalade", "Escalade ESV", "Escalade EXT", "SRX", "STS", "XLR ", ];
            models[7] =["Avalanche", "Aveo", "Cobalt", "Colorado Crew Cab", "Colorado Extended Cab", "Colorado Regular Cab", "Corvette", "Equinox", "Express 1500 Cargo", "Express 1500 Passenger", "Express 2500 Cargo", "Express 2500 Passenger", "Express 3500 Cargo", "Express 3500 Passenger", "HHR", "Impala", "Malibu", "Malibu (Classic)", "Silverado 1500 Crew Cab", "Silverado 1500 Extended Cab", "Silverado 1500 Regular Cab", "Silverado 2500 HD Crew Cab", "Silverado 2500 HD Extended Cab", "Silverado 2500 HD Regular Cab", "Silverado 3500 HD Crew Cab", "Silverado 3500 HD Extended Cab", "Silverado 3500 HD Regular Cab", "Suburban 1500", "Suburban 2500", "Tahoe", "TrailBlazer", "Traverse", "Uplander Cargo", "Uplander Passenger"]; 
            models[8] =["10 68|300", "spen", "Crossfire", "Pacifica", "PT Cruiser", "Sebring", "Town & Country ", ];
            models[9] =["Avenger", "Caliber", "Caravan Grand Cargo", "Caravan Grand Passenger", "Challenger", "Charger", "Dakota Crew Cab", "Dakota Extended Cab", "Durango", "Journey", "Magnum", "Nitro", "Ram 1500 Crew Cab", "Ram 1500 Mega Cab", "Ram 1500 Quad Cab", "Ram 1500 Regular Cab", "Ram 2500 Mega Cab", "Ram 2500 Quad Cab", "Ram 2500 Regular Cab", "Ram 3500 Mega Cab", "Ram 3500 Quad Cab", "Ram 3500 Regular Cab", "Sprinter 2500 Cargo", "Sprinter 2500 Passenger", "Sprinter 3500 Cargo", "Viper"]; 
            models[10] =["430 Scuderia", "599 GTB Fiorano", "612 Scaglietti", "F430 "]; 
            models[11] =["E150 Cargo", "E150 Super Duty Passenger", "E250 Cargo", "E350 Super Duty Cargo", "E350 Super Duty Passenger", "Edge", "Escape", "Expedition", "Expedition EL", "Explorer", "Explorer Sport Trac", "F150 Regular Cab", "F150 Super Cab", "F150 SuperCrew Cab", "F250 Super Duty Crew Cab", "F250 Super Duty Regular Cab", "F250 Super Duty Super Cab", "F350 Super Duty Crew Cab", "F350 Super Duty Regular Cab", "F350 Super Duty Super Cab", "F450 Super Duty Crew Cab", "Flex", "Focus", "Fusion", "Mustang", "Ranger Regular Cab", "Ranger Super Cab", "Taurus", "Taurus X ",];  
            models[12] =[ "Acadia", "Canyon Crew Cab", "Canyon Extended Cab", "Canyon Regular Cab", "Envoy", "Savana 1500 Cargo", "Savana 1500 Passenger", "Savana 2500 Cargo", "Savana 2500 Passenger", "Savana 3500 Cargo", "Savana 3500 Passenger", "Sierra 1500 Crew Cab", "Sierra 1500 Extended Cab", "Sierra 1500 Regular Cab", "Sierra 2500 HD Crew Cab", "Sierra 2500 HD Extended Cab", "Sierra 2500 HD Regular Cab", "Sierra 3500 HD Crew Cab", "Sierra 3500 HD Extended Cab", "Sierra 3500 HD Regular Cab", "Yukon", "Yukon XL 1500", "Yukon XL 2500", ];
            models[13] =["Accord", "Civic", "CR-V", "Element", "Fit", "Odyssey", "Pilot", "Ridgeline", "S2000", ] 
            models[14] =["H2", "H3", ] 
            models[15] =["Accent", "Azera", "Elantra", "Entourage", "Genesis", "Santa Fe", "Sonata", "Tiburon", "Tucson", "Veracruz", ] 
            models[16] =["EX35", "FX35", "FX45", "FX50", "G35", "G37", "M35", "M45", "QX56", ] 
            models[17] =["Ascender", "i-290 Extended Cab", "i-370 Crew Cab", "i-370 Extended Cab", ]; 
            models[18] =["S-Type", "X-Type", "XF", "XJ Series", "XK Series ", ]; 
            models[19] =["Commander", "Compass", "Grand Cherokee", "Liberty", "Patriot", "Wrangler ", ]; 
            models[20] =["Amanti", "Borrego", "Optima", "Rio", "Rondo", "Sedona", "Sorento", "Spectra", "Sportage ", ]; 
            models[21] =[ "LR2", "LR3", "Range Rover", "Range Rover Sport ", ];
            models[22] =["ES 350", "GS 350", "GS 450h", "GS 460", "GX 470", "IS 250", "IS 350", "IS F", "LS 460", "LS 600h", "LX 570", "RX 350", "RX 400h", "SC 430 ", ]; 
            models[23] =["Mark LT", "MKS", "MKX", "MKZ", "Navigator", "Navigator L", "Town Car ", ]; 
            models[24] =["Elise", "Exige S ", ]; 
            models[25] =["GranTurismo", "Quattroporte ", ]; 
            models[26] =[ "B-Series Extended Cab", "B-Series Regular Cab", "CX-7", "CX-9", "MAZDA3", "MAZDA5", "MAZDA6", "Miata MX-5", "RX-8", "Tribute ", ];
            models[27] =["C-Class", "CL-Class", "CLK-Class", "CLS-Class", "E-Class", "G-Class", "GL-Class", "ML-Class", "R-Class", "S-Class", "SL-Class", "SLK-Class", "SLR McLaren ", ]; 
            models[28] =["Grand Marquis", "Mariner", "Milan", "Mountaineer", "Sable ",];  
            models[29] =["Cooper ", ]; 
            models[30] =["Eclipse", "Endeavor", "Galant", "Lancer", "Outlander", "Raider Double Cab", "Raider Extended Cab ", ]; 
            models[31] =["350Z", "Altima", "Armada", "Frontier Crew Cab", "Frontier King Cab", "GT-R", "Maxima", "Murano", "Pathfinder", "Quest", "Rogue", "Sentra", "Titan Crew Cab", "Titan King Cab", "Versa", "Xterra ", ]; 
            models[32] =["G5", "G6", "G8", "Grand Prix", "Solstice", "Torrent", "Vibe ", ]; 
            models[33] =["911", "Boxster", "Cayenne", "Cayman ", ]; 
            models[34] =["Phantom ", ]; 
            models[35] =["9-7X ",];  
            models[36] =["Astra", "Aura", "Outlook", "SKY", "VUE ", ]; 
            models[37] =["tC", "xB", "xD ", ]; 
            models[38] =["fortwo ", ]; 
            models[39] =["Forester", "Impreza", "Legacy", "Outback", "Tribeca ", ]; 
            models[40] =["Forenza", "Grand Vitara", "Reno", "SX4", "XL7 ", ]; 
            models[41] =["4Runner", "Avalon", "Camry", "Corolla", "FJ Cruiser", "Highlander", "Land Cruiser", "Matrix", "Prius", "RAV4", "Sequoia", "Sienna", "Solara", "Tacoma Access Cab", "Tacoma Double Cab", "Tacoma Regular Cab", "Tundra CrewMax", "Tundra Double Cab", "Tundra Regular Cab", "Yaris ",];  
            models[42] =["CC", "Eos", "GLI", "GTI", "Jetta", "New Beetle", "Passat", "R32", "Rabbit", "Routan", "Tiguan", "Touareg", "Touareg 2 ", ]; 
            models[43] =["C30", "C70", "S40", "S60", "S80", "V50", "V70", "XC70", "XC90 ", ]; 
      

 
            models_ids[1] =["1", "2", "3", "4", "5", ]; 
            models_ids[2] =["6", ]; 
            models_ids[3] =[ "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", ];
            models_ids[4] =["20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", ]; 
            models_ids[5] =["39", "40", "41", ]; 
            models_ids[6] =[ "42", "43", "44", "45", "46", "47", "48", "49", ];
            models_ids[7] =["50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", ]; 
            models_ids[8] =["84", "85", "86", "87", "88", "89", "90", ]; 
            models_ids[9] =[ "91", "92", "93", "94", "95", "96", "97", "98", "99", "100", "101", "102", "103", "104", "105", "106", "107", "108", "109", "110", "111", "112", "113", "114", "115", "116", ];
            models_ids[10] =["117", "118", "119", "120", ]; 
            models_ids[11] =[ "121", "122", "123", "124", "125", "126", "127", "128", "129", "130", "131", "132", "133", "134", "135", "136", "137", "138", "139", "140", "141", "142", "143", "144", "145", "146", "147", "148", "149", ];
            models_ids[12] =[ "150", "151", "152", "153", "154", "155", "156", "157", "158", "159", "160", "161", "162", "163", "164", "165", "166", "167", "168", "169", "170", "171", "172", ];
            models_ids[13] =["173", "174", "175", "176", "177", "178", "179", "180", "181", ]; 
            models_ids[14] =["182", "183", ]; 
            models_ids[15] =["184", "185", "186", "187", "188", "189", "190", "191", "192", "193", ]; 
            models_ids[16] =["194", "195", "196", "197", "198", "199", "200", "201", "202", ]; 
            models_ids[17] =["203", "204", "205", "206", ]; 
            models_ids[18] =["207", "208", "209", "210", "211", ]; 
            models_ids[19] =["212", "213", "214", "215", "216", "217", ]; 
            models_ids[20] =["218", "219", "220", "221", "222", "223", "224", "225", "226", ]; 
            models_ids[21] =["227", "228", "229", "230", ]; 
            models_ids[22] =["231", "232", "233", "234", "235", "236", "237", "238", "239", "240", "241", "242", "243", "244", ]; 
            models_ids[23] =["245", "246", "247", "248", "249", "250", "251", ]; 
            models_ids[24] =["252", "253", ]; 
            models_ids[25] =[ "254", "255", ];
            models_ids[26] =[ "256", "257", "258", "259", "260", "261", "262", "263", "264", "265", ];
            models_ids[27] =[ "266", "267", "268", "269", "270", "271", "272", "273", "274", "275", "276", "277", "278", ];
            models_ids[28] =["279", "280", "281", "282", "283", ]; 
            models_ids[29] =["284", ]; 
            models_ids[30] =["285", "286", "287", "288", "289", "290", "291", ]; 
            models_ids[31] =["292", "293", "294", "295", "296", "297", "298", "299", "300", "301", "302", "303", "304", "305", "306", "307", ]; 
            models_ids[32] =["308", "309", "310", "311", "312", "313", "314", ]; 
            models_ids[33] =[ "315", "316", "317", "318", ];
            models_ids[34] =["319", ]; 
            models_ids[35] =[ "320", ];
            models_ids[36] =["321", "322", "323", "324", "325", ]; 
            models_ids[37] =["326", "327", "328", ]; 
            models_ids[38] =["329", ]; 
            models_ids[39] =["330", "331", "332", "333", "334", ]; 
            models_ids[40] =["335", "336", "337", "338", "339", ]; 
            models_ids[41] =[ "340", "341", "342", "343", "344", "345", "346", "347", "348", "349", "350", "351", "352", "353", "354", "355", "356", "357", "358", "359", ];
            models_ids[42] =["360", "361", "362", "363", "364", "365", "366", "367", "368", "369", "370", "371", "372", ]; 
            models_ids[43] =["373", "374", "375", "376", "377", "378", "379", "380", "381", ]; 
       

var makelist = document.sr_auto.sr_mark;
var modellist = document.sr_auto.sr_model;
modellist.options[0] = new Option(models[0][0], 0);
function update_models(selectedgroup)
{
modellist.options.length = 0;
if(selectedgroup > 0)
{
for(i = 0; i <= models[selectedgroup].length; i++)
{
if( i == 0)
modellist.options[modellist.options.length] = new Option(models[0][0], 0);
 else
modellist.options[modellist.options.length] = new Option(models[selectedgroup][i-1], models_ids[selectedgroup][i-1]);
}
}
if(selectedgroup == 0){
modellist.options[modellist.options.length] = new Option(models[0][0], 0);
}
}