import axios from "axios";
import { useEffect, useState } from "react";

export default function useAircrafts() {
    const [aircrafts, setAircrafts] = useState([]);

    useEffect(() => {
        axios
            .get("http://reservations.test/api/aircraft", {
                headers: { Accept: "application/json" },
            })
            .then((response) => {
                const data = response.data;
                setAircrafts(data);
            })
            .catch((err) => console.error("GET error:", err));
    }, []);

    useEffect(() => {
        console.log("Aircrafts: ");
        aircrafts.forEach((aircraft) => {
            console.log(aircraft);
        });
    }, [aircrafts]);

    const addAircraft = (newAircraft) => {
        axios
            .post("http://reservations.test/api/aircraft", newAircraft, {
                headers: { "Content-Type": "application/json" },
            })
            .then((response) => {
                setAircrafts((prev) => [...prev, response.data]);
            })
            .catch((err) => console.error("POST error:", err));
    };

    return [aircrafts, addAircraft];
}
