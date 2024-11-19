<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SDGController extends Controller
{
    public function index()
    {
        $goals = [
            ["title" => "消除貧窮", "description" => "在全球範圍內消除一切形式的貧窮。", "icon" => "fa-dollar-sign", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-01.jpg", "link" => "https://globalgoals.tw/1-no-poverty"],
            ["title" => "終結飢餓", "description" => "終結饑餓，實現糧食安全和改善營養。", "icon" => "fa-utensils", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-02.jpg", "link" => "https://globalgoals.tw/2-zero-hunger"],
            ["title" => "健康與福祉", "description" => "確保健康生活，促進各年齡段人群的福祉。", "icon" => "fa-heartbeat", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-03.jpg", "link" => "https://globalgoals.tw/3-good-health-and-well-being"],
            ["title" => "優質教育", "description" => "確保包容和公平的優質教育，促進終身學習機會。", "icon" => "fa-book", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-04.jpg", "link" => "https://globalgoals.tw/4-quality-education"],
            ["title" => "性別平等", "description" => "實現性別平等，增強所有婦女和女童的權能。", "icon" => "fa-venus", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-05.jpg", "link" => "https://globalgoals.tw/5-gender-equality"],
            ["title" => "淨水和衛生", "description" => "確保人人享有水和衛生設施的可持續管理。", "icon" => "fa-tint", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-06.jpg", "link" => "https://globalgoals.tw/6-clean-water-and-sanitation"],
            ["title" => "可負擔的永續能源", "description" => "確保人人能獲得可負擔的可靠的可持續能源。", "icon" => "fa-bolt", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-07.jpg", "link" => "https://globalgoals.tw/7-affordable-and-clean-energy"],
            ["title" => "就業與經濟成長", "description" => "促進持久、包容和可持續的經濟增長，實現充分和富有成效的就業。", "icon" => "fa-briefcase", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-08.jpg", "link" => "https://globalgoals.tw/8-decent-work-and-economic-growth"],
            ["title" => "永續工業和基礎設施", "description" => "建設韌性基礎設施，促進可持續工業化和鼓勵創新。", "icon" => "fa-industry", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-09.jpg", "link" => "https://globalgoals.tw/9-industry-innovation-and-infrastructure"],
            ["title" => "減少不平等", "description" => "在國家和國家之間縮小不平等。", "icon" => "fa-equals", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-10.jpg", "link" => "https://globalgoals.tw/10-reduced-inequalities"],
            ["title" => "永續城鄉", "description" => "建設包容、安全、有韌性的可持續城市和人類住區。", "icon" => "fa-building", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-11.jpg", "link" => "https://globalgoals.tw/11-sustainable-cities-and-communities"],
            ["title" => "責任消費和生產", "description" => "確保可持續的消費和生產模式。", "icon" => "fa-recycle", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-12.jpg", "link" => "https://globalgoals.tw/12-responsible-consumption-and-production"],
            ["title" => "氣候行動", "description" => "採取緊急行動應對氣候變化及其影響。", "icon" => "fa-thermometer-half", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-13.jpg", "link" => "https://globalgoals.tw/13-climate-action"],
            ["title" => "永續海洋與保育", "description" => "保護和可持續利用海洋和海洋資源。", "icon" => "fa-water", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-14.jpg", "link" => "https://globalgoals.tw/14-life-below-water"],
            ["title" => "陸域生態", "description" => "保護、恢復和促進陸地生態系統的可持續管理。", "icon" => "fa-tree", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-15.jpg", "link" => "https://globalgoals.tw/15-life-on-land"],
            ["title" => "和平與公正", "description" => "促進包容的社會，實現可持續發展。", "icon" => "fa-dove", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-16.jpg", "link" => "https://globalgoals.tw/16-peace-and-justice"],
            ["title" => "永續發展夥伴關係", "description" => "加強實現可持續發展的執行手段，振興全球夥伴關係。", "icon" => "fa-hands-helping", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-17.jpg", "link" => "https://globalgoals.tw/17-partnerships-for-the-goals"]
        ];

        return view('sdgs.sdgs', compact('goals'));
    }
}
