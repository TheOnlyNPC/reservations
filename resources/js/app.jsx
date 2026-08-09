import "../css/app.css"; // Make sure to import your CSS!
import React, { useState } from "react";
import { createRoot } from "react-dom/client";
import Header from "./components/Header";
import AircraftCard from "./components/AircraftCard";
import useAircrafts from "./hooks/useAircrafts";
import AircraftContainer from "./components/AircraftContainer";
import useReservations from "./hooks/useReservations";

function App() {
    const [aircrafts, addAircraft] = useAircrafts([]);
    const [reservations, addReservation] = useReservations([]);
    const [visible, setVisible] = useState(false);

    return (
        <>
            <Header />
            <AircraftContainer
                aircrafts={aircrafts}
                addAircraft={addAircraft}
                visible={visible}
                setVisible={setVisible}
            />
        </>
    );
}

const el = document.getElementById("app");
if (el) {
    createRoot(el).render(<App />);
}
