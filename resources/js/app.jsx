import "../css/app.css";
import React, { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";
import Header from "./components/Header";
import AircraftCard from "./components/AircraftCard";
import useAircrafts from "./hooks/useAircrafts";
import AircraftContainer from "./components/AircraftContainer";
import useReservations from "./hooks/useReservations";
import Reservations from "./components/Reservations";

function App() {
    const [aircrafts, addAircraft] = useAircrafts([]);
    const [reservations, addReservation, updateReservation] = useReservations(
        [],
    );
    const [createAircraft, setCreateAircraft] = useState(false);
    const [updateResVis, setUpdateResVis] = useState(false);
    const [addResVis, setAddResVis] = useState(false);

    return (
        <>
            <Header />
            <AircraftContainer
                aircrafts={aircrafts}
                addAircraft={addAircraft}
                visible={createAircraft}
                setVisible={setCreateAircraft}
            />
            <Reservations
                reservations={reservations}
                aircrafts={aircrafts}
                updateReservation={updateReservation}
                addReservation={addReservation}
                updateResVis={updateResVis}
                setUpdateResVis={setUpdateResVis}
                addResVis={addResVis}
                setAddResVis={setAddResVis}
            />
        </>
    );
}

const el = document.getElementById("app");
if (el) {
    createRoot(el).render(<App />);
}
