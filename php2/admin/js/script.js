function neueZutat() {
    const block = document.querySelector(".zuatetenliste .zutatenblock");
    const neuer_block = block.cloneNode(true);

    neuer_block.querySelector("select").value = "";
    

}