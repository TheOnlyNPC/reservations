const statusStyles = {
    Available: "bg-green-900 text-green-400",
    Grounded: "bg-red-900 text-red-400",
    Maintenance: "bg-yellow-900 text-yellow-400",
};

export default function AircraftCard(props) {
    const status = props.aircraft.status;
    const style = statusStyles[status];

    return (
        <div className="bg-zinc-900 pl-4 pr-2 py-2 text-sm rounded-2xl border-zinc-800 border w-80 transition duration-100 ease-in-out hover:scale-103 cursor-pointer">
            <h3 className={`px-2 rounded-full float-right w-fit ${style}`}>
                {props.aircraft.status}
            </h3>
            <h2 className="text-zinc-50 font-medium w-fit">
                {props.aircraft.registration}
            </h2>
            <div className="pr-2">
                <hr className="border-t border-zinc-800 mt-2 mb-2" />
                <div className="text-sm">
                    <p className="float-right text-zinc-50">
                        {props.aircraft.type.name}
                    </p>
                    <p className="text-zinc-400">Type:</p>
                </div>
                <div className="text-sm">
                    <p className="float-right text-zinc-50">
                        {props.aircraft.type.fuelCapacity}l
                    </p>
                    <p className="text-zinc-400">Max. Fuel:</p>
                </div>
                <div className="text-sm">
                    <p className="float-right text-zinc-50">
                        {props.aircraft.type.seats - 1} + 👨‍✈️
                    </p>
                    <p className="text-zinc-400">Seats:</p>
                </div>
            </div>
        </div>
    );
}
