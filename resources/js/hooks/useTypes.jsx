import axios from "axios";
import { useEffect, useState } from "react";

export default function useTypes() {
    const [types, setTypes] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        axios
            .get("http://reservations.test/api/type")
            .then((response) => {
                if (response.data.data) {
                    setTypes(response.data.data);
                } else {
                    setTypes(response.data);
                }
                setLoading(false);
            })
            .catch((error) => {
                console.error(error);
                setLoading(false);
            });
    }, []);

    return [types, loading];
}
