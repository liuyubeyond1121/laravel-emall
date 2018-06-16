function addressInit(data,_cmbProvince, _cmbCity, _cmbArea, defaultProvince, defaultCity, defaultArea) {
    var cmbProvince = document.getElementById(_cmbProvince);
    var cmbCity = document.getElementById(_cmbCity);
    var cmbArea = document.getElementById(_cmbArea);

    function cmbAddOption(cmb, str, value ,obj)
    {
        var option = document.createElement("OPTION");
        cmb.options.add(option);
        option.innerHTML = str;
        option.value = value;
        option.obj = obj;
    }

    function cmbSelect(cmb, str) {
        for (var i = 0; i < cmb.options.length; i++) {
            if (cmb.options[i].value == str) {
                cmb.selectedIndex = i;
                return;
            }
        }
    }
    function changeProvince()
    {
        cmbCity.options.length = 0;
        cmbCity.onchange = null;
        if(cmbProvince.selectedIndex == -1)return;
        var item = cmbProvince.options[cmbProvince.selectedIndex].obj;
        for(var second in item.zi)
        {
            cmbAddOption(cmbCity, item.zi[second].name, item.zi[second].id ,item.zi[second]);
        }
        cmbAddOption(cmbCity, '无', '', null);
        cmbSelect(cmbCity, defaultCity);
        changeCity();
        cmbCity.onchange = changeCity;
    }
    function changeCity()
    {
        cmbArea.options.length = 0;
        if(cmbCity.selectedIndex == -1)return;
        var item = cmbCity.options[cmbCity.selectedIndex].obj;
        for(var third in item.zi)
        {
            cmbAddOption(cmbArea, item.zi[third].name, item.zi[third].id, null);
        }
        cmbAddOption(cmbArea, '无', '', null);
        cmbSelect(cmbArea, defaultArea);
    }

    for(var first in data)
    {
        cmbAddOption(cmbProvince, data[first].name, data[first].id, data[first]);
    }
    cmbSelect(cmbProvince, defaultProvince);
    changeProvince();
    cmbProvince.onchange = changeProvince;
} ;