import axios from "axios";
import { useEffect, useState } from "react";

export default function useReservations() {
    const [reservations, setReservations] = useState([]);

    useEffect(() => {
        axios
            .get("http://reservations.test/api/reservation", {
                headers: { Accept: "application/json" },
            })
            .then((response) => {
                const data = response.data;
                setReservations(data);
            })
            .catch((err) => console.error("GET error:", err));
    }, []);

    useEffect(() => {
        console.log("Reservations: ");
        reservations.forEach((registration) => {
            console.log(registration);
        });
    }, [reservations]);

    const addReservation = (newReservation) => {
        axios
            .post("http://reservations.test/api/reservation", newReservation, {
                headers: { "Content-Type": "application/json" },
            })
            .then((response) => {
                setReservations((prev) => [...prev, response.data]);
            })
            .catch((err) => console.error("POST error:", err));
    };

    return [reservations, addReservation];
}
