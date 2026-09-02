import {
    Dialog,
    DialogBackdrop,
    DialogPanel,
    Fieldset,
    Field,
    Input,
    Label,
    Button,
} from "@headlessui/react";
import clsx from "clsx";
import { useForm } from "react-hook-form";

export default function UpdateReservationForm({
    updateReservation,
    reservations,
    id,
    visible,
    setVisible,
}) {
    const res = reservations.find((item) => item.id === id);

    const {
        register,
        handleSubmit,
        setValue,
        formState: { errors },
    } = useForm({
        values: {
            registration: res?.aircraft?.reservation || "",
            startsAt: res?.startsAt?.dateTimeLocal || "",
            endsAt: res?.endsAt?.dateTimeLocal || "",
        },
    });

    const registrationRegister = register("registration", { required: true });

    const handleRegistrationChange = (event) => {
        setValue("registration", event.target.value.toUpperCase(), {
            shouldValidate: true,
        });
        registrationRegister.onChange(event);
    };

    const onSubmit = (data) => {
        updateReservation(id, data);
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
                                Edit Reservation
                            </legend>

                            <Field>
                                <Label className="text-sm font-medium">
                                    Registration
                                </Label>
                                <Input
                                    {...registrationRegister}
                                    onChange={handleRegistrationChange}
                                    value={res?.aircraft.registration}
                                    className={clsx(
                                        "mt-3 block w-full rounded-lg border-none bg-white/5 px-3 py-1.5 text-sm text-white uppercase focus:outline-none",
                                        errors.registration &&
                                            "outline-2 outline-red-500",
                                    )}
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
                                    Change
                                </Button>
                            </div>
                        </Fieldset>
                    </form>
                </DialogPanel>
            </div>
        </Dialog>
    );
}
