import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxOption,
    ComboboxOptions,
} from "@headlessui/react";
import { ChevronDownIcon } from "@heroicons/react/16/solid";
import clsx from "clsx";
import { useState } from "react";

export default function AircraftCombo({
    aircrafts,
    handleAircraftSelect,
    selectedAircraft,
    setSelectedAircraft,
    errors,
}) {
    const [query, setQuery] = useState("");

    const filteredAircrafts =
        query === ""
            ? aircrafts
            : aircrafts.filter((aircraft) => {
                  return aircraft.registration
                      .toLowerCase()
                      .includes(query.toLowerCase());
              });

    return (
        <Combobox
            as="div"
            name="assignee"
            value={selectedAircraft}
            onChange={handleAircraftSelect}
            onClose={() => setQuery("")}
            className={clsx(
                "relative mt-3 block w-full",
                errors.registration && "rounded-lg outline-2 outline-red-500",
            )}
        >
            <ComboboxInput
                aria-label="Registration"
                displayValue={(aircraft) => aircraft?.registration || ""}
                onChange={(event) => setQuery(event.target.value)}
                className="w-full rounded-lg border-none bg-white/5 px-3 py-1.5 text-sm text-white uppercase focus:outline-none"
            />
            <ComboboxButton className="group absolute inset-y-0 right-0 px-2.5">
                <ChevronDownIcon className="size-4 fill-white/60 group-data-hover:fill-white" />
            </ComboboxButton>
            <ComboboxOptions className="absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-xl border border-white/10 bg-neutral-900 p-1 shadow-lg empty:invisible">
                {filteredAircrafts.map((aircraft) => (
                    <ComboboxOption
                        key={aircraft.id}
                        value={aircraft}
                        className="cursor-pointer rounded-lg px-3 py-1.5 text-sm text-white data-focus:bg-white/10"
                    >
                        {aircraft.registration}
                    </ComboboxOption>
                ))}
            </ComboboxOptions>
        </Combobox>
    );
}
