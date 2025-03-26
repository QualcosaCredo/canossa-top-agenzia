async function fetchImmobili(){
    const filtroTipologia = document.querySelector("#filtroTipologia").value
    const filtroPrezzo = document.querySelector("#filtroPrezzo").value.trim()
    const filtroQuartiere = document.querySelector("#filtroQuartiere").value
    const filtroSuperficie = document.querySelector("#filtroSuperficie").value
    const filtroStato = document.querySelector("#filtroStato").value

    const response = await fetch("../include/getFiltered.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            tipologia:  filtroTipologia,
            prezzo:     filtroPrezzo,
            quartiere:  filtroQuartiere,
            superficie: filtroSuperficie,
            stato:      filtroStato
        })
    })

    if(!response.ok){
        throw new Error(`Failed to fetch from database: ${response.status}`)
    }

    const arr = await response.json()

    return arr
}

function aggiornaStato(codice, stato) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "aggiorna_stato.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); // Mostra la risposta dal server
        }
    };
    xhr.send("codice=" + codice + "&stato=" + stato);
}

function buildTable(items){
    const view = document.querySelector("#view-immobili")
    if(items == undefined || items.length <= 0) {
        view.innerHTML = "Non ce nulla."

        return
    }

    const keyArr = JSON.parse(items.result[0]) 
    const keys = Object.keys(keyArr)

    const table = document.createElement("table")
    const head = document.createElement("tr")

    keys.forEach(key => {
        const kHead = document.createElement("th")
        kHead.innerText = key
        head.appendChild(kHead)
    });
    table.appendChild(head)

    for(let i = 0; i < items.result.length; i++){
        const body = document.createElement("tr")
        const itemArr = JSON.parse(items.result[i])

        if(itemArr['CodiceImmobile'] == undefined){
            continue
        }

        keys.forEach(key => {
            const kElement = document.createElement("td")

            if(key === "stato" && Number(items.is_admin)){
                const updateStatus = document.createElement("select");

                const disponibile = document.createElement("option");
                disponibile.innerText = "Disponibile"

                const venduto = document.createElement("option");
                venduto.innerText = "Venduto"
                const riservato = document.createElement("option");
                riservato.innerText = "Riservato"

                updateStatus.appendChild(disponibile)
                updateStatus.appendChild(venduto)
                updateStatus.appendChild(riservato)

                updateStatus.value = itemArr[key]

                updateStatus.addEventListener("change", () => {
                    aggiornaStato(itemArr['CodiceImmobile'],updateStatus.value)
                });

                kElement.appendChild(updateStatus)

            }else{
                kElement.innerText = itemArr[key]

            }

            body.append(kElement)
        });
        table.appendChild(body)
    }

    view.innerHTML = ""
    view.appendChild(table)
}

async function update(){
    try {
        const data = await fetchImmobili();
        console.log(data.is_admin)
        buildTable(data);
    } catch (error) {
        console.error("Error:", error);
    }
}

const filterDiv = document.querySelector("#filter-div")
const htmlSelect = filterDiv.querySelectorAll(".filter-selector")

document.addEventListener("DOMContentLoaded",update)
htmlSelect.forEach(element => {
    element.addEventListener("change",update)
});