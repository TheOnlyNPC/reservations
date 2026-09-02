import {
    Button,
    Description,
    Dialog,
    DialogBackdrop,
    DialogPanel,
    DialogTitle,
    Fieldset,
    Field,
    Input,
    Label,
    Textarea,
    Legend,
    Select,
} from "@headlessui/react";
import { ChevronDownIcon } from "@heroicons/react/20/solid";
import clsx from "clsx";
import { useEffect, useRef, useState } from "react";
import { useForm } from "react-hook-form";
import useTypes from "../hooks/useTypes";
import axios from "axios";
import useAircrafts from "../hooks/useAircrafts";

export default function AddAircraftForm({
    aircrafts,
    addAircraft,
    visible,
    setVisible,
}) {
    const [types, loading] = useTypes([]);
    const [createType, setCreateType] = useState(false);

    const {
        register,
        handleSubmit,
        watch,
        setValue,
        formState: { errors },
    } = useForm();

    const registrationRegister = register("registration", { required: true });

    const handleRegistrationChange = (event) => {
        setValue("registration", event.target.value.toUpperCase(), {
            shouldValidate: true,
        });
        registrationRegister.onChange(event);
    };

    const onSubmit = (data) => {
        addAircraft(data);
        setVisible(false);
    };

    return (
        <Dialog
            open={visible}
            onClose={() => setVisible(false)}
            className="relative z-50"
        >
            <DialogBackdrop
                transition
                className="fixed inset-0 bg-black/30 transition duration-300 ease-out data-closed:opacity-0"
            />

            <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div className="flex min-h-full items-center justify-center p-4">
                    <DialogPanel
                        transition
                        className="w-full max-w-md rounded-xl bg-white/5 p-6 backdrop-blur-2xl transition duration-300 ease-out data-closed:scale-95 data-closed:opacity-0"
                    >
                        <form onSubmit={handleSubmit(onSubmit)}>
                            <Fieldset className="space-y-4">
                                <Legend className="text-base/7 font-semibold text-white">
                                    Aircraft To Fleet
                                </Legend>

                                <Field>
                                    <Label className="text-sm/6 font-medium text-white">
                                        Registration
                                    </Label>
                                    <Input
                                        {...registrationRegister}
                                        onChange={handleRegistrationChange}
                                        className={clsx(
                                            "mt-3 block w-full rounded-lg border-none bg-white/5 px-3 py-1.5 text-sm/6 text-white uppercase",
                                            "focus:not-data-focus:outline-none data-focus:outline-2 data-focus:-outline-offset-2 data-focus:outline-white/25",
                                            errors.registration &&
                                                "outline-2 outline-red-500",
                                        )}
                                    />
                                    {errors.registration && (
                                        <p className="mt-1 text-xs text-red-400">
                                            Registration is required.
                                        </p>
                                    )}
                                </Field>

                                <Field>
                                    <Label className="text-sm/6 font-medium text-white">
                                        Model
                                    </Label>
                                    <div className="relative">
                                        <Select
                                            {...register("type_id", {
                                                required: true,
                                            })}
                                            className={clsx(
                                                "mt-3 block w-full appearance-none rounded-lg border-none bg-white/5 px-3 py-1.5 text-sm/6 text-white",
                                                "focus:not-data-focus:outline-none data-focus:outline-2 data-focus:-outline-offset-2 data-focus:outline-white/25",
                                                "*:text-black",
                                                errors.type_id &&
                                                    "outline-2 outline-red-500",
                                            )}
                                        >
                                            <option value="">
                                                Select a model...
                                            </option>
                                            {loading && (
                                                <option disabled>
                                                    Loading...
                                                </option>
                                            )}
                                            {types.map((type) => (
                                                <option
                                                    key={type.id}
                                                    value={type.id}
                                                >
                                                    {type.name}
                                                </option>
                                            ))}
                                        </Select>
                                        <ChevronDownIcon
                                            className="group pointer-events-none absolute top-2.5 right-2.5 size-4 fill-white/60"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    {errors.type_id && (
                                        <p className="mt-1 text-xs text-red-400">
                                            Model selection is required.
                                        </p>
                                    )}
                                </Field>

                                <Field>
                                    <Label className="text-sm/6 font-medium text-white">
                                        Status
                                    </Label>
                                    <div className="relative">
                                        <Select
                                            {...register("status", {
                                                required: true,
                                            })}
                                            className={clsx(
                                                "mt-3 block w-full appearance-none rounded-lg border-none bg-white/5 px-3 py-1.5 text-sm/6 text-white",
                                                "focus:not-data-focus:outline-none data-focus:outline-2 data-focus:-outline-offset-2 data-focus:outline-white/25",
                                                "*:text-black",
                                                errors.status &&
                                                    "outline outline-2 outline-red-500",
                                            )}
                                        >
                                            <option>Available</option>
                                            <option>Maintenance</option>
                                            <option>Grounded</option>
                                        </Select>
                                        <ChevronDownIcon
                                            className="group pointer-events-none absolute top-2.5 right-2.5 size-4 fill-white/60"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    {errors.status && (
                                        <p className="mt-1 text-xs text-red-400">
                                            Status is required.
                                        </p>
                                    )}
                                </Field>

                                <div className="mt-6 flex justify-end gap-3">
                                    <Button
                                        type="button"
                                        onClick={() => setVisible(false)}
                                        className="rounded-md bg-white/10 px-4 py-2 text-sm font-medium text-white hover:bg-white/20"
                                    >
                                        Cancel
                                    </Button>
                                    <Button
                                        type="submit"
                                        className="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500"
                                    >
                                        Add Aircraft
                                    </Button>
                                </div>
                            </Fieldset>
                        </form>
                    </DialogPanel>
                </div>
            </div>
        </Dialog>
    );
}
