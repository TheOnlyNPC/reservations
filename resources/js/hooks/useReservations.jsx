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
        newReservation["user_id"] = 1;
        axios
            .post("http://reservations.test/api/reservation", newReservation, {
                headers: { "Content-Type": "application/json" },
            })
            .then((response) => {
                setReservations((prev) => [...prev, response.data]);
            })
            .catch((err) => console.error("POST error:", err));
    };

    const updateReservation = (id, changes) => {
        axios
            .patch(`http://reservations.test/api/reservation/${id}`, changes, {
                headers: { "Content-Type": "application/json" },
            })
            .then((response) => {
                console.log(response.data);

                setReservations((prev) =>
                    prev.map((res) => {
                        if (res.id == id) {
                            return response.data;
                        } else {
                            return res;
                        }
                    }),
                );
                console.log(reservations);
            })
            .catch((err) => console.error("PATCH error:", err));
    };

    return [reservations, addReservation, updateReservation];
}
