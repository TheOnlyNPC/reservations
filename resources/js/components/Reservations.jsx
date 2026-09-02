import { useMemo, useState, useEffect } from "react";
import { DayPilot, DayPilotScheduler } from "@daypilot/daypilot-lite-react";
import dayjs from "dayjs";
import "../../css/reservations.css";
import {
    Button,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/react";
import {
    ArchiveBoxXMarkIcon,
    ChevronDownIcon,
    PencilIcon,
    Square2StackIcon,
    TrashIcon,
} from "@heroicons/react/16/solid";
import UpdateReservationForm from "./UpdateReservationForm";
import CreateReservationForm from "./CreateReservationForm";
import { PlusIcon } from "@heroicons/react/20/solid";

export default function Reservations({
    reservations,
    aircrafts,
    updateReservation,
    updateResVis,
    setUpdateResVis,
    addResVis,
    setAddResVis,
    addReservation,
}) {
    const [currentId, setCurrentId] = useState(1);

    useEffect(() => {
        console.log(updateResVis);
    }, [updateResVis]);

    return (
        <>
            <UpdateReservationForm
                key={currentId}
                updateReservation={updateReservation}
                reservations={reservations}
                id={currentId}
                aircrafts={aircrafts}
                visible={updateResVis}
                setVisible={setUpdateResVis}
            />
            <CreateReservationForm
                addReservation={addReservation}
                reservations={reservations}
                aircrafts={aircrafts}
                visible={addResVis}
                setVisible={setAddResVis}
            />

            <h2 className="text-zinc-50 font-bold text-md ml-4 mt-10">
                Reservations
            </h2>
            <div className="mx-auto max-w-5xl w-full rounded-2xl border border-zinc-800 bg-zinc-900 shadow-xl">
                <table className="w-full table-auto border-collapse text-sm text-zinc-300">
                    <thead>
                        <tr className="*:px-6 *:py-4 border-b border-zinc-800 bg-zinc-950/50 text-xs font-semibold uppercase tracking-wider text-zinc-400 overflow-hidden rounded-t-2xl">
                            <th className="text-left rounded-tl-2xl">
                                Aircraft
                            </th>
                            <th className="text-left">User</th>
                            <th className="text-center">Duration</th>
                            <th className="text-center">Start Time</th>
                            <th className="text-center">End Time</th>
                            <th className="text-right">Start Date</th>
                            <th className="text-right">End Date</th>
                            <th className="text-center rounded-tr-2xl">
                                <Button
                                    onClick={() => {
                                        setAddResVis(!addResVis);
                                    }}
                                    className="inline-flex items-center gap-2 rounded-full bg-zinc-800 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-inner shadow-white/10 focus:not-data-focus:outline-none data-focus:outline data-focus:outline-white data-hover:bg-zinc-700 data-open:bg-zinc-700"
                                >
                                    <PlusIcon className="size-4 fill-white/60" />
                                </Button>
                            </th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-zinc-800/60">
                        {reservations.map((res) => (
                            <tr
                                key={res.id}
                                className="*:px-6 *:py-3.5 transition-colors hover:bg-zinc-800/40 text-zinc-100"
                            >
                                <td className="text-left font-medium text-white">
                                    {res.aircraft.registration}
                                </td>
                                <td className="text-left text-zinc-300">
                                    {res.user.name}
                                </td>
                                <td className="text-center text-zinc-400">
                                    {res.duration}
                                </td>
                                <td className="text-center text-emerald-400">
                                    {res.startsAt.time}
                                </td>
                                <td className="text-center text-rose-400">
                                    {res.endsAt.time}
                                </td>
                                <td className="text-right text-zinc-400">
                                    {res.startsAt.date}
                                </td>
                                <td className="text-right text-zinc-400">
                                    {res.endsAt.date}
                                </td>
                                <td className="relative">
                                    <Button
                                        onClick={() => {
                                            setCurrentId(res.id);
                                            setUpdateResVis(!updateResVis);
                                        }}
                                        className="inline-flex items-center gap-2 rounded-full bg-zinc-800 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-inner shadow-white/10 focus:not-data-focus:outline-none data-focus:outline data-focus:outline-white data-hover:bg-zinc-700 data-open:bg-zinc-700"
                                    >
                                        <PencilIcon className="size-4 fill-white/60" />
                                    </Button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    );
}
