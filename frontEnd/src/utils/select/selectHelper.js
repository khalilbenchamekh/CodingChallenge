

export function selectHelper(response, valueNeeded) {
    let arrayTemp = [];
    for (let i = 0; i < response.length; i++) {
        let obj = {};
        obj = {
            value:
                valueNeeded === "id" ?
                    response[i].id :
                    response[i].name
            , label: response[i].name
        };
        if (obj !== {}) {
            arrayTemp.push(obj);
        }
    }
    return arrayTemp;
}
