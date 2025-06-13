<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Diagnose;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataDeploySeeder extends Seeder
{
    private $colors = [
        // Warna dasar
        "Putih",
        "Hitam",
        "Cokelat",
        "Abu-Abu",
        "Kuning",
        "Jingga",
        "Merah",
        "Biru",
        "Hijau",
        "Emas",
        "Perak",
        "Krim",
        "Beige",
        "Marun",
        "Zaitun",
        "Cokelat Kayu Manis",

        // Gradasi / variasi
        "Cokelat Muda",
        "Cokelat Tua",
        "Abu-Abu Muda",
        "Abu-Abu Tua",
        "Kuning Muda",
        "Kuning Tua",
        "Cokelat Kemerahan",
        "Cokelat Kehitaman",
        "Hitam Legam",
        "Putih Gading",
        "Putih Pucat",
        "Krem",
        "Karamel",
        "Pasir",

        // Pola & kombinasi
        "Bergaris",
        "Berbintik",
        "Bercorak Totol",
        "Belang-Belang",
        "Bercorak Merle",
        "Roan",
        "Tortoiseshell",
        "Calico",
        "Berbelang",
        "Bertambal",
        "Polos",
        "Dua Warna",
        "Tiga Warna",

        // Warna langka atau khusus
        "Albino",
        "Leusistik",
        "Melanistik",
        "Pelangi",
        "Biru Metalik",
        "Hijau Metalik",
        "Merah Delima",
        "Hijau Zamrud",
        "Biru Safir",

        // Warna alami/spesifik
        "Perunggu",
        "Tembaga",
        "Pirus",
        "Kuning Mustard",
        "Oker",
        "Auburn",
        "Batu",
        "Hijau Lumut",
        "Mutiara",
        "Opal",
        "Ungu Kristal",
        "Biru Kobalt",
        "Batu Sabak",
        "Karatan",
        "Asap"
    ];
    private $services = [
        ["name" => "Pemeriksaan Umum", "price" => 50000],
        ["name" => "Vaksinasi Rabies", "price" => 75000],
        ["name" => "Vaksinasi Kombinasi", "price" => 120000],
        ["name" => "Sterilisasi Kucing", "price" => 300000],
        ["name" => "Sterilisasi Anjing", "price" => 450000],
        ["name" => "Pengobatan Kulit", "price" => 90000],
        ["name" => "Pembersihan Telinga", "price" => 40000],
        ["name" => "Pembersihan Gigi", "price" => 100000],
        ["name" => "Potong Kuku", "price" => 30000],
        ["name" => "Penitipan Hewan (Per Hari)", "price" => 60000],
        ["name" => "Konsultasi Nutrisi", "price" => 50000],
        ["name" => "USG Hewan", "price" => 250000],
        ["name" => "Rontgen Hewan", "price" => 300000],
        ["name" => "Pengecekan Kehamilan", "price" => 100000],
        ["name" => "Pemeriksaan Darah Lengkap", "price" => 150000],
        ["name" => "Pemeriksaan Urin", "price" => 80000],
        ["name" => "Pemeriksaan Feses", "price" => 70000],
        ["name" => "Terapi Infus", "price" => 110000],
        ["name" => "Suntik Vitamin", "price" => 50000],
        ["name" => "Suntik Antibiotik", "price" => 60000],
        ["name" => "Operasi Luka Ringan", "price" => 200000],
        ["name" => "Operasi Luka Berat", "price" => 500000],
        ["name" => "Operasi Caesar", "price" => 800000],
        ["name" => "Penanganan Patah Tulang", "price" => 700000],
        ["name" => "Pengangkatan Tumor", "price" => 900000],
        ["name" => "Terapi Parasit Dalam", "price" => 85000],
        ["name" => "Terapi Parasit Luar", "price" => 85000],
        ["name" => "Pembersihan Kelenjar Anal", "price" => 40000],
        ["name" => "Pemotongan Telinga", "price" => 250000],
        ["name" => "Pemotongan Ekor", "price" => 200000],
        ["name" => "Eutanasia (Penyuntikan Tidur)", "price" => 150000],
        ["name" => "Perawatan Pasca Operasi", "price" => 100000],
        ["name" => "Terapi Fisioterapi", "price" => 120000],
        ["name" => "Pemberian Obat Cacing", "price" => 40000],
        ["name" => "Pemberian Obat Kutu", "price" => 45000],
        ["name" => "Checkup Rutin Tahunan", "price" => 70000]
    ];
    private $animals = [
        ["name" => "Kucing", "pulse" => 180, "temperature" => 38, "breath" => 25],
        ["name" => "Anjing", "pulse" => 100, "temperature" => 38, "breath" => 24],
        ["name" => "Kelinci", "pulse" => 220, "temperature" => 39, "breath" => 45],
        ["name" => "Hamster", "pulse" => 350, "temperature" => 37, "breath" => 90],
        ["name" => "Guinea Pig", "pulse" => 300, "temperature" => 38, "breath" => 70],
        ["name" => "Kuda", "pulse" => 36, "temperature" => 38, "breath" => 12],
        ["name" => "Sapi", "pulse" => 60, "temperature" => 39, "breath" => 35],
        ["name" => "Kambing", "pulse" => 80, "temperature" => 39, "breath" => 20],
        ["name" => "Domba", "pulse" => 80, "temperature" => 39, "breath" => 16],
        ["name" => "Babi", "pulse" => 90, "temperature" => 39, "breath" => 14],
        ["name" => "Ayam", "pulse" => 300, "temperature" => 41, "breath" => 30],
        ["name" => "Bebek", "pulse" => 190, "temperature" => 41, "breath" => 35],
        ["name" => "Burung Paruh Bengkok", "pulse" => 250, "temperature" => 40, "breath" => 40],
        ["name" => "Iguana", "pulse" => 40, "temperature" => 30, "breath" => 8],
        ["name" => "Kura-Kura", "pulse" => 25, "temperature" => 28, "breath" => 5],
        ["name" => "Ular", "pulse" => 20, "temperature" => 27, "breath" => 4],
        ["name" => "Kucing Hutan", "pulse" => 150, "temperature" => 38, "breath" => 22],
        ["name" => "Anjing Laut", "pulse" => 70, "temperature" => 37, "breath" => 10],
        ["name" => "Lumba-Lumba", "pulse" => 100, "temperature" => 36, "breath" => 8],
        ["name" => "Gajah", "pulse" => 30, "temperature" => 36, "breath" => 10],
        ["name" => "Rusa", "pulse" => 70, "temperature" => 38, "breath" => 22],
        ["name" => "Beruang", "pulse" => 40, "temperature" => 37, "breath" => 10],
        ["name" => "Singa", "pulse" => 55, "temperature" => 38, "breath" => 20],
        ["name" => "Harimau", "pulse" => 60, "temperature" => 38, "breath" => 18],
        ["name" => "Koala", "pulse" => 90, "temperature" => 36, "breath" => 14]
    ];
    private $allBreeds = [
        [ // Kucing
            ["name" => "Persia"],
            ["name" => "Anggora"],
            ["name" => "Maine Coon"],
            ["name" => "Siamese"],
            ["name" => "Domestic Short Hair"],
        ],
        [ // Anjing
            ["name" => "Golden Retriever"],
            ["name" => "Labrador"],
            ["name" => "Pomeranian"],
            ["name" => "Poodle"],
            ["name" => "Bulldog"],
        ],
        [ // Kelinci
            ["name" => "Holland Lop"],
            ["name" => "Netherland Dwarf"],
            ["name" => "Rex Rabbit"],
        ],
        [ // Hamster
            ["name" => "Syrian Hamster"],
            ["name" => "Roborovski"],
            ["name" => "Winter White"],
        ],
        [ // Guinea Pig
            ["name" => "Abyssinian"],
            ["name" => "American Guinea Pig"],
            ["name" => "Peruvian"],
        ],
        [ // Kuda
            ["name" => "Thoroughbred"],
            ["name" => "Arabian Horse"],
        ],
        [ // Sapi
            ["name" => "Simental"],
            ["name" => "Limousin"],
        ],
        [ // Kambing
            ["name" => "Ettawa"],
            ["name" => "Kambing Kacang"],
        ],
        [ // Domba
            ["name" => "Dorset"],
            ["name" => "Merino"],
        ],
        [ // Babi
            ["name" => "Landrace"],
            ["name" => "Duroc"],
        ],
        [ // Ayam
            ["name" => "Ayam Kampung"],
            ["name" => "Ayam Bangkok"],
        ],
        [ // Bebek
            ["name" => "Bebek Pekin"],
            ["name" => "Bebek Mojosari"],
        ],
        [ // Burung Paruh Bengkok
            ["name" => "Macaw"],
            ["name" => "Kakatua"],
        ],
        [ // Iguana
            ["name" => "Iguana Hijau"],
            ["name" => "Red Iguana"],
        ],
        [ // Kura-Kura
            ["name" => "Kura-Kura Sulcata"],
            ["name" => "Kura-Kura Ambon"],
        ],
        [ // Ular
            ["name" => "Ular Sanca"],
            ["name" => "Ball Python"],
        ],
        [ // Kucing Hutan
            ["name" => "Kucing Hutan Asia"],
            ["name" => "Serval"],
        ],
        [ // Anjing Laut
            ["name" => "Anjing Laut California"],
            ["name" => "Anjing Laut Bulu"],
        ],
        [ // Lumba-Lumba
            ["name" => "Lumba-Lumba Hidung Botol"],
            ["name" => "Lumba-Lumba Spinner"],
        ],
        [ // Gajah
            ["name" => "Gajah Asia"],
            ["name" => "Gajah Afrika"],
        ],
        [ // Rusa
            ["name" => "Rusa Timor"],
            ["name" => "Rusa Bawean"],
        ],
        [ // Beruang
            ["name" => "Beruang Madu"],
            ["name" => "Grizzly Bear"],
        ],
        [ // Singa
            ["name" => "Singa Afrika"],
            ["name" => "Singa Asia"],
        ],
        [ // Harimau
            ["name" => "Harimau Sumatera"],
            ["name" => "Harimau Bengal"],
        ],
        [ // Koala
            ["name" => "Koala Australia"],
        ],
    ];
    private $allDiagnoses = [
        [ // Kucing
            ["name" => "Flu Kucing"],
            ["name" => "Scabies"],
            ["name" => "Cacingan"],
            ["name" => "Feline Panleukopenia"],
        ],
        [ // Anjing
            ["name" => "Distemper"],
            ["name" => "Parvovirus"],
            ["name" => "Jamur Kulit"],
            ["name" => "Cacingan"],
        ],
        [ // Kelinci
            ["name" => "Myxomatosis"],
            ["name" => "Pasteurellosis"],
            ["name" => "Gigi Panjang"],
        ],
        [ // Hamster
            ["name" => "Wet Tail"],
            ["name" => "Infeksi Pernafasan"],
            ["name" => "Tumor Kulit"],
        ],
        [ // Guinea Pig
            ["name" => "Skabies"],
            ["name" => "Pododermatitis"],
            ["name" => "Defisiensi Vitamin C"],
        ],
        [ // Kuda
            ["name" => "Colic"],
            ["name" => "Laminitis"],
            ["name" => "Strangles"],
        ],
        [ // Sapi
            ["name" => "Mastitis"],
            ["name" => "Foot and Mouth Disease"],
            ["name" => "Bloat"],
        ],
        [ // Kambing
            ["name" => "Orf"],
            ["name" => "Enterotoxemia"],
            ["name" => "Scabies"],
        ],
        [ // Domba
            ["name" => "Brucellosis"],
            ["name" => "Pneumonia"],
            ["name" => "Cacing Hati"],
        ],
        [ // Babi
            ["name" => "Swine Flu"],
            ["name" => "Erysipelas"],
            ["name" => "Cacingan"],
        ],
        [ // Ayam
            ["name" => "Tetelo (ND)"],
            ["name" => "Gumboro"],
            ["name" => "Coryza"],
        ],
        [ // Bebek
            ["name" => "Duck Plague"],
            ["name" => "Botulism"],
            ["name" => "Salmonellosis"],
        ],
        [ // Burung Paruh Bengkok
            ["name" => "Psittacosis"],
            ["name" => "Beak and Feather Disease"],
            ["name" => "Infeksi Saluran Pernapasan"],
        ],
        [ // Iguana
            ["name" => "Metabolic Bone Disease"],
            ["name" => "Stomatitis"],
            ["name" => "Parasit Usus"],
        ],
        [ // Kura-Kura
            ["name" => "Shell Rot"],
            ["name" => "Infeksi Saluran Pernapasan"],
            ["name" => "Hypovitaminosis A"],
        ],
        [ // Ular
            ["name" => "Mouth Rot"],
            ["name" => "Infeksi Jamur"],
            ["name" => "Parasit Internal"],
        ],
        [ // Kucing Hutan
            ["name" => "Infeksi Saluran Pernafasan"],
            ["name" => "Cacingan"],
            ["name" => "Stres Adaptasi"],
        ],
        [ // Anjing Laut
            ["name" => "Infeksi Mata"],
            ["name" => "Pneumonia"],
            ["name" => "Luka Gigitan"],
        ],
        [ // Lumba-Lumba
            ["name" => "Skin Lesions"],
            ["name" => "Respiratory Infection"],
            ["name" => "Stress Disorder"],
        ],
        [ // Gajah
            ["name" => "Tuberculosis"],
            ["name" => "Foot Abscess"],
            ["name" => "Kolik"],
        ],
        [ // Rusa
            ["name" => "Antraks"],
            ["name" => "Cacing Paru"],
            ["name" => "Foot Rot"],
        ],
        [ // Beruang
            ["name" => "Obesitas"],
            ["name" => "Infeksi Gigi"],
            ["name" => "Artritis"],
        ],
        [ // Singa
            ["name" => "Distemper"],
            ["name" => "Infeksi Kulit"],
            ["name" => "Cacingan"],
        ],
        [ // Harimau
            ["name" => "Parasit Usus"],
            ["name" => "Cidera Kaki"],
            ["name" => "Infeksi Kulit"],
        ],
        [ // Koala
            ["name" => "Klamidia"],
            ["name" => "Penyakit Gusi"],
            ["name" => "Infeksi Saluran Kemih"],
        ],
    ];

    public function run(): void
    {
        foreach ($this->colors as $item) {
            Color::create(["name" => $item]);
        }
        foreach ($this->services as $item) {
            Service::create($item);
        }
        foreach ($this->animals as $item) {
            Animal::create($item);
        }
        foreach ($this->allBreeds as $id => $item) {
            foreach ($item as $name) {
                Type::create(["animal_id" => $id + 1, "name" => $name["name"]]);
            }
        }
        foreach ($this->allDiagnoses as $id => $item) {
            foreach ($item as $name) {
                Diagnose::create(["animal_id" => $id + 1, "name" => $name["name"]]);
            }
        }
    }
}
