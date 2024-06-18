let attributes__geojson = {
  type: 'FeatureCollection',
  features: []  // <--- no features
};

let api__route = "page";

export class api__page {

  attributes__geojson__get(){
    return attributes__geojson;
  }

  async attributes__init(){

    let _datastring;
    let _r;

    _datastring = {
      name:'variables__get',
      map__slug:MAP_SLUG
    }

    _r = await Promise.all([
      _request(_datastring)
    ]);

    attributes__geojson = _r[0];

  }

}



async function _request(_datastring) {

  console.log(api__route,_datastring.name,`--START`);

  return new Promise((resolve, reject) => {
    axios
      .post(`${FLAT_URL__API}${api__route}/`, _datastring)
      .then((response) => {

        console.log(api__route,_datastring.name,`--END`);

        if(parseInt(response.data.response, 10) !== 200){
          console.log(api__route,_datastring.name,`--DATA-ERROR`);
          return;
        }

        resolve(response.data); // Resolve the promise

      })
      .catch((error) => {

        console.log(api__route,_datastring.name,`--ERROR`);
        console.error(error);

        reject(error); // Reject the promise if there's an error

      })
  }); // Promise
}
