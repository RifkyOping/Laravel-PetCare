<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktik extends Model
{
    use HasFactory;
    protected $table = 'jadwal_praktik';
    protected $fillable = ['dokter_id', 'hari'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function getHariFormattedAttribute()
    {
        if (empty($this->hari)) return '-';

        $daysMap = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];
        $daysReverse = array_flip($daysMap);

        $savedDays = array_map('trim', explode(',', $this->hari));
        if (count($savedDays) <= 1) return $this->hari;

        $nums = [];
        foreach ($savedDays as $d) {
            // Capitalize properly to match mapping just in case
            $d = ucfirst(strtolower($d));
            if (isset($daysMap[$d])) {
                $nums[] = $daysMap[$d];
            } else {
                return $this->hari; // Fallback to raw string if unrecognized format
            }
        }

        sort($nums);

        // Check if consecutive
        $isConsecutive = true;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            if ($nums[$i + 1] - $nums[$i] !== 1) {
                $isConsecutive = false;
                break;
            }
        }

        // Only format as Range if consecutive and more than 2 days
        if ($isConsecutive && count($nums) > 2) {
            return $daysReverse[$nums[0]] . ' - ' . $daysReverse[$nums[count($nums) - 1]];
        }

        return implode(', ', array_map(function($n) use ($daysReverse) { return $daysReverse[$n]; }, $nums));
    }

}
