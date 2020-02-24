 
export function formatMoney(value) {
     return Number(value).toLocaleString("es-AR", {
        style: "currency",
        currency: "USD",
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    })
}
