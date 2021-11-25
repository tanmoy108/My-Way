const districtsList = document.querySelector('.districts');
const endPoint = "https://bdapis.herokuapp.com/api/v1.1/districts/";

async function bdApi(url) {
    const res = await fetch(url)
    return res.json();
}

bdApi(endPoint)
    .then(districts => {
        const allDistricts = districts.data;
        let output = "";

        allDistricts.forEach(district => {

            output += ` <Option>${district.district}</Option>`;
        })
        districtsList.innerHTML = output;
    })
    .catch(error => {
        console.error('Error::', error);
    });