import { useEffect, useState } from "react";
import useAircrafts from "../hooks/useAircrafts";
import AddAircraftForm from "./AddAircraftForm";
import AircraftCard from "./AircraftCard";

export default function AircraftContainer({
    aircrafts,
    addAircraft,
    visible,
    setVisible,
}) {
    return (
        <div className="flex flex-col justify-center w-full p-4">
            <div className="mb-2">
                <button
                    onClick={setVisible.bind(null, !visible)}
                    className="bg-zinc-900 text-zinc-400 text-sm rounded-2xl border-zinc-800 border float-right bg-zinc-100-900 px-2 py-1 transition duration-100 ease-in-out hover:scale-103 cursor-pointer"
                >
                    Add Aircraft +
                </button>
                <AddAircraftForm
                    visible={visible}
                    setVisible={setVisible}
                    aircrafts={aircrafts}
                    addAircraft={addAircraft}
                />
                <h2 className="text-zinc-50 font-bold text-md w-full">
                    Aircrafts
                </h2>
            </div>
            <div className="flex flex-wrap justify-center gap-4 max-w-5xl w-full mx-auto">
                {aircrafts.map((aircraft) => (
                    <AircraftCard key={aircraft.id} aircraft={aircraft} />
                ))}
            </div>
        </div>
    );
}
