export async function d004__check_element__exist(element, counter = 3) {
  // _onsole.log("checkAsyncElementExists");

  if (counter == 0) {
    //throw new Error("Whoops!");
    console.warn("Element not found");
    return false;
  }

  if (element.length == 0) {
    console.log("In");
    await timeout(1000);
    return await d004__check_element__exist(element, --counter);
    // return false;
  }

  // Lo trova nei primi 3 tentativi
  // _onsole.log("Out 23")
  return true;
}

function timeout(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}