import {
    Dialog,
    DialogBackdrop,
    DialogPanel,
    Fieldset,
    Field,
    Input,
    Label,
    Button,
    Combobox,
    ComboboxInput,
    ComboboxOption,
    ComboboxOptions,
    ComboboxButton,
} from "@headlessui/react";
import { ChevronDownIcon } from "@heroicons/react/16/solid";
import clsx from "clsx";
import { useState, useEffect } from "react";
import { useForm } from "react-hook-form";
import AircraftCombo from "./AircraftCombo";

export default function CreateReservationForm({
    addReservation,
    reservations,
    aircrafts,
    visible,
    setVisible,
}) {
    const [selectedAircraft, setSelectedAircraft] = useState(
        aircrafts?.[0] || "",
    );

    const getLocalNowString = () => {
        const now = new Date();
        const localNow = new Date(
            now.getTime() - now.getTimezoneOffset() * 60000,
        );
        return localNow.toISOString().slice(0, 16);
    };

    const {
        register,
        handleSubmit,
        setValue,
        formState: { errors },
    } = useForm();

    useEffect(() => {
        register("registration", { required: true });
    }, [register]);

    const handleAircraftSelect = (aircraft) => {
        setSelectedAircraft(aircraft);
        if (aircraft) {
            setValue("registration", aircraft.registration, {
                shouldValidate: true,
            });
        }
    };

    const onSubmit = (data) => {
        addReservation(data);
        setVisible(false);
    };

    return (
        <Dialog
            open={visible}
            onClose={() => setVisible(false)}
            className="relative z-50 text-white"
        >
            <DialogBackdrop
                transition
                className="fixed inset-0 bg-black/30 transition duration-300 data-closed:opacity-0"
            />

            <div className="fixed inset-0 z-10 w-screen overflow-y-auto flex items-center justify-center p-4">
                <DialogPanel
                    transition
                    className="w-full max-w-md rounded-xl bg-neutral-900 p-6 border border-white/10 transition duration-300 data-closed:scale-95 data-closed:opacity-0"
                >
                    <form onSubmit={handleSubmit(onSubmit)}>
                        <Fieldset className="space-y-4">
                            <legend className="text-base font-semibold">
                                Add Reservation
                            </legend>

                            <Field>
                                <Label className="text-sm font-medium">
                                    Registration
                                </Label>
                                <AircraftCombo
                                    aircrafts={aircrafts}
                                    selectedAircraft={selectedAircraft}
                                    setSelectedAircraft={setSelectedAircraft}
                                    handleAircraftSelect={handleAircraftSelect}
                                    errors={errors}
                                />
                                {errors.registration && (
                                    <p className="mt-1 text-xs text-red-400">
                                        Required.
                                    </p>
                                )}
                            </Field>

                            <Field>
                                <Label className="text-sm font-medium">
                                    Start
                                </Label>
                                <input
                                    {...register("startsAt", {
                                        required: true,
                                    })}
                                    defaultValue={getLocalNowString()}
                                    type="datetime-local"
                                    className="mt-3 block w-full rounded-lg bg-white/5 px-3 py-1.5 text-sm text-white border-none focus:outline-none"
                                />
                                {errors.startsAt && (
                                    <p className="mt-1 text-xs text-red-400">
                                        Required.
                                    </p>
                                )}
                            </Field>

                            <Field>
                                <Label className="text-sm font-medium">
                                    End
                                </Label>
                                <input
                                    {...register("endsAt", { required: true })}
                                    type="datetime-local"
                                    defaultValue={getLocalNowString()}
                                    className="mt-3 block w-full rounded-lg bg-white/5 px-3 py-1.5 text-sm text-white border-none focus:outline-none"
                                />
                                {errors.endsAt && (
                                    <p className="mt-1 text-xs text-red-400">
                                        Required.
                                    </p>
                                )}
                            </Field>

                            <div className="mt-6 flex justify-end gap-3">
                                <Button
                                    type="button"
                                    onClick={() => setVisible(false)}
                                    className="rounded-md bg-white/10 px-4 py-2 text-sm"
                                >
                                    Cancel
                                </Button>
                                <Button
                                    type="submit"
                                    className="rounded-md bg-indigo-600 px-4 py-2 text-sm hover:bg-indigo-500"
                                >
                                    Create
                                </Button>
                            </div>
                        </Fieldset>
                    </form>
                </DialogPanel>
            </div>
        </Dialog>
    );
}
