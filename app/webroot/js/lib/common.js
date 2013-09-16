/* 
 * Purpose of this file is to gather all needed functions
 */

function processErrors(errorArr, form) {
    if( typeof errorArr === 'string') {
        $(form+"AddForm .form-group:first").before('<span class="label3" style="margin-bottom: 5px;">'+errorArr+'</span>');
        return;
    }
    
    for (key in errorArr) {
        var name = capitalize(key);
        $(form+name).before('<span class="label3" style="margin-bottom: 5px;">'+errorArr[key][0]+'</span>');
    }
}

function capitalize(a) {
    s = [];
    for (var i=0; i<a.length; i++) {
        if (i == 0) {
            s.push(a[i].charAt(i).toUpperCase());
        } else {
            s.push(a[i]);
        }
    }
    s = s.join('');
    return s;
}
