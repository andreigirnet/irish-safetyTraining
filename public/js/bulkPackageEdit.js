let selectedIds = [];
function grabIdsBulk(elem){
    const id = elem.value;
    const index = selectedIds.indexOf(id);

    if (elem.checked && index === -1) {
        selectedIds.push(id);
    } else if (!elem.checked && index !== -1) {
        selectedIds.splice(index, 1);
    }
    if(selectedIds.length>0) {
        document.getElementById('countEditBulk').innerHTML = ': ' + selectedIds.length + '';
    }else {
        document.getElementById('countEditBulk').innerHTML =  '';
    }
    updateBulkEditLink();
}

function updateBulkEditLink() {
    const bulkEditLink = document.getElementById('bulkEditLink');
    const baseUrl = bulkEditLink.getAttribute('href');
    const queryString = selectedIds.length > 0 ? '?selected_ids=' + selectedIds.join(',') : '';
    bulkEditLink.setAttribute('href', baseUrl.split('?')[0] + queryString); // Remove existing query parameters before appending new one
}
